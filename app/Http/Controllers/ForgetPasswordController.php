<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\PasswordResetNotification;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('login.forgetPassword');
    }
    public function resetPassword(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ]);

        $email = $request->email;
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token
        ]);

        $user = User::where('email',$email)->first();
        if($user){
            $user->notify(new PasswordResetNotification($token));
        }
        return back()->with('message','Link sent successfully');
    }

    public function newPassword($tokenId){
        $token = DB::table('password_reset_tokens')->where('token',$tokenId)->first();
        $email = $token->email;
        return view('login.newPassword',compact('email'));
    }

    public function newPasswordStore(Request $request){
        // dd($request->all());
        $validatedData = $request->validate([
            'email' => ['required', 'email','exists:users,email'],
            'password' => ['required','min:8','unique:users,password','confirmed'], 
            'password_confirmation' => ['required'],
        ]);
        
        $user = User::where('email',$validatedData['email'])->first();
        if($user){
            $user->password = Hash::make($validatedData['password']);
            $user->save();

            // delete the reset token
            DB::table('password_reset_tokens')->where('email',$user->email)->delete();

            return redirect()->route('login')->with('message','password reset successfully');
        }else {
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }

        
        
    }
}
