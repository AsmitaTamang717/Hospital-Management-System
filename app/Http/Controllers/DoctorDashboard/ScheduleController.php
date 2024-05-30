<?php

namespace App\Http\Controllers\DoctorDashboard;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ScheduleRequest;

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
        $user = Auth::user();
        $doctorId = $user->doc_id;
        $schedules = $this->schedules->where('doc_id',$doctorId)->get();
        // dd($schedules);
        
        
        return view('doctorDashboard.schedule.index',compact('schedules','user'));
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

    public function updateAvailability(Request $request, $id)
    {

        $schedule = Schedule::findOrFail($id);
        $availability = $request->input('availability');
    
        $schedule->status = $availability;
        $schedule->save();
       
        return redirect()->back()->with('message', 'Availability updated successfully.');
    }
}
