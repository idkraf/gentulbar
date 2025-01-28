<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class AddUserModal extends Component
{
    use WithFileUploads;

    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role;
    public $avatar;
    public $saved_avatar;
    public $email_verified_at;

    public $edit_mode = false;

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email',
        'role' => 'required|string',
        'password' => 'required',
        'avatar' => 'nullable|sometimes|image|max:1024',
    ];

    // $request->validate([
    //     'token' => ['required'],
    //     'email' => ['required', 'email'],
    //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
    // ]);
    protected $listeners = [
        'delete_user' => 'deleteUser',
        'update_user' => 'updateUser',
    ];

    public function render()
    {
        $roles = Role::all();

        $roles_description = [
            'administrator' => 'Best for business owners and company administrators',
            'kordes' => 'Untuk petugas koordinator desa',
            'pjp' => 'Untuk petugas penanggung jawab kelompok',
        ];

        foreach ($roles as $i => $role) {
            $roles[$i]->description = $roles_description[$role->name] ?? '';
        }

        return view('livewire.user.add-user-modal', compact('roles'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            // Prepare the data for creating a new user
            $data = [
                'name' => $this->name,
            ];

            // dd($data);
            if ($this->avatar) {
                $data['profile_photo_path'] = $this->avatar->store('avatars', 'public');
            } else {
                $data['profile_photo_path'] = null;
            }

            $this->email_verified_at=  Carbon::now();
            // dd($this->email_verified_at);
            $data['email_verified_at'] = $this->email_verified_at;
            
            // $data['remember_token'] = Str::random(10);

            // if (!$this->edit_mode) {
                // $data['password'] = Hash::make($this->email);
                $data['password'] = Hash::make($this->password);
            // }

            // Create a new user record in the database
            // $user = $this->user_id ? User::find($this->user_id) : User::updateOrCreate([
            //     'email' => $this->email,
            // ], $data);
            $user = User::updateOrCreate([
                'email' => $this->email,
            ], $data);

            // $request->user()->update([
            //     'last_login_at' => Carbon::now()->toDateTimeString(),
            //     'last_login_ip' => $request->getClientIp()
            // ]);
            if ($this->edit_mode) {
                foreach ($data as $k => $v) {
                    $user->$k = $v;
                }
            }

            // Event::assertDispatched(Verified::class);
            // $this->assertTrue($user->fresh()->hasVerifiedEmail());
            // $user = User::factory()->create([
            //     'email_verified_at' => time(),
            // ]);

            if ($this->edit_mode) {
                // Assign selected role for user
                $user->syncRoles($this->role);

                // Emit a success event with a message
                $this->emit('success', __('User updated'));
            } else {
                // Assign selected role for user
                $user->assignRole($this->role);

                // $request->session()->put('auth.password_confirmed_at', time());
                // Send a password reset link to the user's email
                // Password::sendResetLink($user->only('email'));

                // Emit a success event with a message
                $this->emit('success', __('New user created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    public function deleteUser($id)
    {
        // Prevent deletion of current user
        if ($id == Auth::id()) {
            $this->emit('error', 'User cannot be deleted');
            return;
        }

        // Delete the user record with the specified ID
        User::destroy($id);

        // Emit a success event with a message
        $this->emit('success', 'User successfully deleted');
    }

    public function updateUser($id)
    {
        $this->edit_mode = true;

        $user = User::find($id);

        $this->user_id = $user->id;
        $this->saved_avatar = $user->profile_photo_url;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->email_verified_at = $user->email_verified_at;
        $this->password = $user->password;
        $this->role = $user->roles?->first()->name ?? '';
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
