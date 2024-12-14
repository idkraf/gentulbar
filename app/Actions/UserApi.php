<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserApi
{
    public function datatableList(Request $request)
    {
        $draw = $request->input('draw', 0);
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $columns = $request->input('columns');
        $searchValue = $request->input('search.value');

        $orderColumn = $request->input('order.0.column', 0); // Get the order column index
        $orderDir = $request->input('order.0.dir', 'asc'); // Get the order direction (ASC or DESC)

        $query = User::query()->with('roles');

        if ($searchValue) {
            $searchColumns = ['name', 'email'];
            $query->where(function ($query) use ($searchValue, $searchColumns) {
                foreach ($searchColumns as $column) {
                    $query->orWhere(DB::raw("LOWER($column)"), 'LIKE', '%' . strtolower($searchValue) . '%');
                }
            });
        }

        // Get the column name for ordering based on the orderColumn index
        $orderColumnName = $columns[$orderColumn]['data'] ?? 'id';

        // exclude core user for demo purpose
        $query->whereNotIn('id', [1]);

        // Apply ordering to the query
        $query->orderBy($orderColumnName, $orderDir);

        $totalRecords = $query->count();

        $records = $query->offset($start)->limit($length)->get();

        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $records,
            'orderColumnName' => $orderColumnName,
        ];

        return $data;
    }

    public function create(Request $request)
    {
        $user = $request->all();

        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
        ];

        $validator = Validator::make($user, $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $updated = User::create($user);

        return response()->json(['success' => $updated]);
    }

    public function get($id)
    {
        $user = User::findOrFail($id);
        $user['idDpt'] = "0";
        $user['idTps'] = "0";
        return $user;
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->update($data);

        $user->assignRole($request->role);

        return response()->json(['success' => true]);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
    public function login(Request $request)
    {
        try {
            //validation
            $validator = validator()->make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->messages()->toJson(),
                ]);
            }
            $req_email = $request->email;
            $user = User::where(function ($query) use ($req_email) {
                $query->where('email', $req_email);
            })->first();
            
            // $roles = $user->getRoleNames(); 
            // dd($roles);
            if($user == null){
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry there is no user data associated with your email',
                ]);
            }


            if (Hash::check($request->password, $user->password)) {
                return $this->loginSuccess($request, $user);
            }
            
            return response()->json([
                'success' => false,
                'message' => 'Your current password does not matches with the password you provided. Please try again.',
            ]);
                
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ada kesalahan silahkan kontak admin.',
            ]);
        }
    }

    public function loginSuccess(Request $request, $user, $token = null)
    {

        if (!$token) {
            $token = $user->createToken('API Token')->plainTextToken;
        }

        return response()->json([
            'success' => true,
            'message' => 'Login success',
            'access_token' => $token,
            'user' => [
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_photo_path' => $user->profile_photo_path,
            ],
        ]);
    }
}
