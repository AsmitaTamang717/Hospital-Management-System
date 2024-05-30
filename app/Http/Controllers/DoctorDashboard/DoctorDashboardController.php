<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctorDashboard.index');
    }

   public function markRead(){
    $user = Auth::user();

    $doctor = $user->doctor;
    $doctor->markAsRead();
    return redirect()->back();
   }
}
