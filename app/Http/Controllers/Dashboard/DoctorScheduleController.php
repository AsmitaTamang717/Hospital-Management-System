<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;

class DoctorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $schedules,$doctors;
    public function __construct(Schedule $schedules, Doctor $doctors){
        $this->schedules = $schedules;
        $this->doctors = $doctors;
    }
    public function index()
    {
        $doctors = $this->doctors->all();
        $fullname=[];
        foreach($doctors as $doctor){
            $fullname[$doctor['id']] = $doctor['first_name'].' '.$doctor['middle_name'].' '.$doctor['last_name'];
        }
        // dd($fullname);
        $schedules = $this->schedules->with('doctor')->simplePaginate(5);
        // dd($schedules);
        return view('dashboard.schedule.index',compact('schedules','fullname'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = $this->doctors->all();

        $fullname=[];
        foreach($doctors as $doctor){
            $fullname[$doctor['id']] = $doctor['first_name'].' '.$doctor['middle_name'].' '.$doctor['last_name'];
           
        }
        return view('dashboard.schedule.create',compact('fullname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request)
    {
        // dd($request);
        $validatedSchedule = $request->validated();
        // dd($validatedSchedule['days']);
        if($validatedSchedule['days']){
            foreach($validatedSchedule['days'] as $key=> $days){
                //  dd($validatedSchedule['days'][$key]);
                $this->schedules->create([
                    'doc_id' => $validatedSchedule['doc_id'],
                    'date' => $validatedSchedule['date'],
                    'from' => $validatedSchedule['from'],
                    'to' => $validatedSchedule['to'],
                    'days' => $validatedSchedule['days'][$key],
                    'availability' => $validatedSchedule['availability'],
                    'total_quota' => $validatedSchedule['total_quota'],

                ]);
            }
        }
        
        return redirect()->route('doctorSchedules.index')->with('message','Schedule created successfully');
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
    public function edit($id)
    {
      $schedule = $this->schedules->findorFail($id);
      $doctors = $this->doctors->all();
      $fullname=[];
      foreach($doctors as $doctor){
          $fullname[$doctor['id']] = $doctor['first_name'].' '.$doctor['middle_name'].' '.$doctor['last_name'];
      }
      $fromTime = Carbon::parse($schedule->from)->format('H:i' ); 
      $toTime = Carbon::parse($schedule->to)->format('H:i' ); 


      return view('dashboard.schedule.edit',compact('schedule','fromTime','toTime','fullname'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, $id)
    {
       
        $schedule = $this->schedules->findOrFail($id);
        $validatedSchedule = $request->validated();
        // dd($validatedSchedule );
        
        if(isset($schedule)){
          $schedule->update($validatedSchedule);
          return redirect()->route('doctorSchedules.index')->with('message','Schedule updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $schedule= $this->schedules->findOrFail($id);
        if(isset($schedule)){
            $schedule->delete();
            return redirect()->route('doctorSchedules.index')->with('message','Schedule deleted successfully');
        }
    }
}
