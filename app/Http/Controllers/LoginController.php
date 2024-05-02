<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginValidation;
use App\Http\Controllers\Controller;
use App\Models\HospitalUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){

        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }
        
        return view('login.index');
    }
    
    public function authenticateUser(LoginValidation $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'Credentials did not match',
        ]);
    }

}



