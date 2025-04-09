<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\ResetLinks;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordLink;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function dashboard(){
        return view('backend.backend-app');
    }
    public function login()
    {
        return view('backend.auth.login');
    }

    ################ loginSubmit ################
    public function loginSubmit(Request $info){
        $info->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $data = $info->all();
        $credentials =[
            'email' => $data['email'],
            'password' => $data['password']
        ];
        if(Auth::attempt($credentials)){
            return response()->json([
                'success' => true,
                'message' => 'Login successful!',
                'redirect_url' => route('admin.dashboard')
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Your Email or Password is Incorrect',
        ], 401);
    }

    ################ LOGOUT ################
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin.login'); // or JSON response if using AJAX
    }

    public function forgetPassword(){
        return view('backend.auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $info){
        $info->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        // Store token in database
        DB::table('password_reset_tokens')->updateOrInsert(
        [
        'email'=>  $info->email,
        ],
        [
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $resultUrl = url('/admin/reset-password/'. $token);
        Mail::to($info->email)->send(new ResetLinks($resultUrl));

        return response()->json([
            'success' => true,
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }


    public function resetPassword($token){
        // find the token record in DB
        $record = DB::table('password_reset_tokens')->where('token', $token)->first();

        if (!$record) {
            return redirect('/')->with('Invalid Token');
        }
        // Token matched — show the reset form
        return view('backend.auth.reset-password', ['token' => $token]);
    }
    public function resetPasswordSubmit(Request $request){
        $request->validate([
            'password'=> 'required|confirmed'
        ]);

        if(!$request->token){
            return response()->json([
                'status'=> false,
                'message'=> 'Invalid Request'
            ], 400);
        }

        $token = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        if(!$token){
            return response()->json([
                'status' => false,
                'message'=> 'Invalid Token'
            ]);
        }

        $user = User::where('email', $token->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        //delete token
        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Your password has been reset successfully!',
            'redirect_url' => route('admin.login')
        ]);
    }
}
