<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * postForgotPassword
     *
     * @param  mixed $request
     * @return void
     */
    public function postForgotPassword(Request $request)
    {
        $req_email = $request->email;

        $validator = validator()->make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->getMessageBag()->first(),
            ]);
        }
        $user = User::where(function ($query) use ($req_email) {
            $query->where('email', $req_email);
        })->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User doesn\'t exists!.',
            ]);
        }


        if ($user->s_active == 0) {
            return response()->json([
                'success' => false,
                'message' => 'User doesn\'t exists!.',
            ]);
        }


        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        if($status == Password::RESET_LINK_SENT){
            $nodata = "Reset Password link has been send to your email address..";
            return response()->json([ 
                'success' => true,
                'message' => $nodata
            ], 200);
        }

    }

    /**
     * sendEmail
     *
     * @param  mixed $user
     * @param  mixed $url
     * @return void
     */
    private function sendEmail($user, $url)
    {
        Mail::send('emails.reset-password', [
            'username' => $user->name,
            'url' => $url,
        ], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject("Hello $user->name, reset your password");
        });
    }


}
