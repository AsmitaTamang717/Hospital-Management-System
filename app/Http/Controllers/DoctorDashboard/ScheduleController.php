<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorDashboardRequest;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $schedules;
    public function __construct(Schedule $schedules){
        $this->schedules = $schedules;
    }
    public function index()
    {
        $schedules = $this->schedules->all();

        return view('doctorDashboard.schedule.index',compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctorDashboard.schedule.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request)
    {
        
       $validatedSchedule = $request->validated();
        $doctorId = Auth::user()->doc_id;
        // dd($doctorId);

        $this->schedules->create([
            'doc_id' => $doctorId,
            'date' => $request->date,
            'from' => $request->from,
            'to' => $request->to,
        ]);
        
        return redirect()->route('schedule.index')->with('message','Schedule created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
  
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
      $schedule = $this->schedules->findorFail($id);
      $fromTime = Carbon::parse($schedule->from)->format('H:i'); 
      $toTime = Carbon::parse($schedule->to)->format('H:i'); 


      return view('doctorDashboard.schedule.edit',compact('schedule','fromTime','toTime'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, $id)
    {
        $schedule = $this->schedules->findorFail($id);
        $validatedSchedule = $request->validated();

        if($validatedSchedule){
            $schedule->update($validatedSchedule);
            return redirect()->route('schedule.index')->with('message','Schedule updated successfully');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schedule = $this->schedules->findorFail($id);
        if($schedule){
            $schedule->delete();
        }
        return redirect()->route('schedule.index')->with('message','Schedule deleted successfully');

    }
}
