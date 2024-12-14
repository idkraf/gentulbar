<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeleteAccountController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function create (Request $request)
    {
        
        addJavascriptFile('assets/js/custom/authentication/hapus-akun/general.js');
        return view('pages/auth.delete-account');
    }
    public function delete(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to find the user by email
    $user = User::where('email', $validated['email'])->first();

    if (!$user) {
        // Return error if user not found
        return response()->json([
            'success' => false,
            'message' => 'No account found with this email.'
        ], 404);
    }

    // Check if the password matches
    if (!Hash::check($validated['password'], $user->password)) {
        return response()->json([
            'success' => false,
            'message' => 'The password you entered is incorrect.'
        ], 401);
    }

    // Delete the user account
    $user->delete();

    // Return success message after deleting the account
    return response()->json([
        'success' => true,
        'message' => 'Your account has been deleted successfully.'
    ]);
}

    public function delete_(Request $request)
{
    // Validate the incoming request data
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to find the user by email
    $user = User::where('email', $validated['email'])->first();

    if (!$user) {
        return redirect()->back()->withErrors(['message' => 'No account found with this email.']);
    }

    // Check if the password matches
    if (!Hash::check($validated['password'], $user->password)) {
        return redirect()->back()->withErrors(['message' => 'The password you entered is incorrect.']);
    }

    // Delete the user account
    $user->delete();

    // Optionally log out the user if you have them logged in (depending on your app behavior)
    // Auth::logout();

    // Redirect to homepage or login page after deletion
    return redirect('/')->with('message', 'Your account has been deleted successfully.');
}


    public function _delete(Request $request){
        // Validate the incoming request data
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to find the user by email
        $user = User::where('email', $request->input('email'))->first();
        if($user != null){
            
            // Check if user exists and verify the password
            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return redirect()->back()->withErrors(['error' => 'The provided email or password is incorrect.']);
            }

            // Delete the user account from the database
            $user->delete();

            // Redirect or return a success message
            return redirect('/')->with('message', 'Your account has been deleted successfully.');
        }else{

            return redirect('hapus-akun')->withErrors(['message' => __('Akun tidak ditemukan')]);
        }
        
    
    }
}
