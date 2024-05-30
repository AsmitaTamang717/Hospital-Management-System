<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        // dd($user);
        if ($user && $user->hasRole('doctor')) {
            return redirect()->route('doctorDashboard.index');
        }
        // if ($user && $user->hasRole('doctor')) {
        //     return redirect()->route('doctorDashboard.index');
        // } elseif ($user && $user->hasRole(['superadmin', 'admin'])) {
        //     return redirect()->route('dashboard');
        // }

        return $next($request);
    }
}
