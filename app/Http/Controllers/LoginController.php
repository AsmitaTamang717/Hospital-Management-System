<?php


namespace App\Http\Controllers;
use App\Http\Requests\LoginValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    
    public function authenticateUser(LoginValidation $request){
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            if ($user && $user->hasRole('doctor')) {
                    return redirect()->route('doctorDashboard.index');
                } elseif ($user && $user->hasRole(['superadmin', 'admin'])) {
                    return redirect()->route('dashboard');
                }
        }
   
        return back()->withErrors([
            'email' => 'Credentials did not match',
        ]);
    }

}



