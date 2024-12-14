<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class ChangePasswordController extends Controller
{
    public function create(Request $request)
    {
        addJavascriptFile('assets/js/custom/authentication/reset-password/update-password.js');

        // return view('pages/auth.change-password', ['request' => $request]);
        $user = Auth::user();
        $request->email = $user->email;
        $request->token = $user->createToken('API Token')->plainTextToken;

        // $request->token = Auth::user()->token;
        return view('pages.profile.change-password', [
            'title' => 'Change Password',
            'request' => $request
        ]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $cek = Hash::check($request->get('current_password'), Auth::user()->password);

        if (!$cek) {
            // The passwords matches
            return response()->json([
                'success' => false,
                'message' => "Your current password does not matches with the password you provided. Please try again."
            ], 500);
        }

        if (strcmp($request->get('current-password'), $request->get('password')) == 0) {
            //Current password and new password are same
            return response()->json([ 
                'success' => false,
                'message' => "New Password cannot be same as your current password. Please choose a different password."
            ], 500);
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return response()->json([ 
            'success' => true,
            'message' => "Password changed successfully !"
        ], 200);
    }

}
