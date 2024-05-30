<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Notifications\AppointmentCreatedNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;


class AppointmentController extends Controller
{
    protected $doctors, $schedules, $patients, $appointments;
    public function __construct(Doctor $doctors, Schedule $schedules, Patient $patients, Appointment $appointments)
    {
        $this->doctors = $doctors;
        $this->schedules = $schedules;
        $this->patients = $patients;
        $this->appointments = $appointments;
    }
    public function index()
    {
        return view('frontend.appoinment');
    }
    public function confirm()
    {
        return view('frontend.confirmation');
    }


    public function store(AppointmentRequest $request)
    {
        DB::beginTransaction();
        // try {
        $appointment = $request->validated();
        $schedule = $this->schedules->find($appointment['schedule_id']);
        $doctor = $schedule->doctor;

        if ($request->hasFile('medical_history')) {
            $file = $request->file('medical_history');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('frontend/images/medical_history'), $fileName);
            $appointment['medical_history'] = 'frontend/images/medical_history/' . $fileName;
        }

        if ($request->fullname) {
            $patient = $this->patients->create($appointment);

            if ($patient) {
                $appointment = $this->appointments->create([
                    'doc_id' => $appointment['doc_id'],
                    'schedule_id' => $appointment['schedule_id'],
                    'patient_id' => $patient->id,
                    'time_interval' => $appointment['time_interval'],
                    'message' => $appointment['message']
                ]);
                $method = 'appointment_created';

                // Notify the doctor
                $doctor->notify(new AppointmentCreatedNotification($appointment, $patient, $method));

                DB::commit();
                return redirect()->route('confirm');
            }
        }
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return back()->with('error', $e->getMessage());
        // }
    }


    public function getDoctors($departmentId)
    {
        $doctors = $this->doctors->where('dep_id', $departmentId)->get()->map(function ($doctor) {
            $doctor->full_name = $doctor->first_name . ' ' . $doctor->middle_name . ' ' . $doctor->last_name;
            return $doctor;
            // dd($doctor);    
        });

        $doctors = $doctors->pluck('full_name', 'id');
        return response()->json(['doctors' => $doctors]);
    }

    public function getSchedules($selectedDoctorId)
    {
        $currentDay = Carbon::now()->format('l');
        $currentTime = Carbon::now()->timezone('Asia/Kathmandu')->format('H:i A');
        $currentDayLowercase = strtolower($currentDay);
        $schedules = $this->schedules->where('doc_id', $selectedDoctorId)->get();
        $daysOfWeek = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $currentDayIndex = array_search($currentDayLowercase, $daysOfWeek);
        $availableScheduleDays = [];

        foreach ($schedules as $schedule) {
            $scheduleDayIndex = array_search($schedule->days, $daysOfWeek);
            if ($schedule->days == $currentDayLowercase) {
                if ($currentTime < $schedule->from) {
                    $availableScheduleDays[] = $schedule;
                }
            }

            if ($scheduleDayIndex > $currentDayIndex) {

                $availableScheduleDays[] = $schedule;
            }
        }
        return response()->json(['availableScheduleDays' => $availableScheduleDays]);
    }

    public function checkQuota($scheduleId)
    {
        $schedule = $this->schedules->findOrFail($scheduleId);
        $total_quota = $schedule->total_quota;
        $appointmentCount = $schedule->appointments->count();
        return response()->json(['appointmentCount' => $appointmentCount, 'total_quota' => $total_quota]);
    }
}
