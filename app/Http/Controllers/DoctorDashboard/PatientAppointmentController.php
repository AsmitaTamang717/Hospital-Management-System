<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $appointments, $patients, $doctors;
    public function __construct(Appointment $appointments, Patient $patients, Doctor $doctors)
    {
        $this->appointments = $appointments;
        $this->patients = $patients;
        $this->doctors = $doctors;
    }
    public function index()
    {
      
        $doctorId = Auth::user()->doc_id;
        $appointmentDetails = $this->appointments->where('doc_id',$doctorId)->with('patient')->get();
        return view('doctorDashboard.appointment.index',compact('appointmentDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $doctorId = Auth::user()->doc_id;
        // $appointmentDetails = $this->appointments->where('doc_id',$doctorId)->with('patient')->get();
        // // dd($appointmentDetails);
        // return view('doctorDashboard.appointment.view',compact('appointmentDetails'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
