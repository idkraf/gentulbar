<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Exception;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    /**
     * login
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token,
            ],
        ]);
    }
}
