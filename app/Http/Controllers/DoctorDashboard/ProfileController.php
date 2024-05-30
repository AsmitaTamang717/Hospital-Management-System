<?php

namespace App\Http\Controllers\DoctorDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\District;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $doctors, $departments,$districts,$doctorEducation,$doctorExperience;

    public function __construct(Doctor $doctors, Department $departments, District $districts,DoctorEducation $doctorEducation, DoctorExperience $doctorExperience){
        $this->doctors = $doctors;
        $this->departments = $departments;
        $this->districts = $districts;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
    }

    
    public function index(){
        $user = Auth::user();
        $doctorId = $user->doc_id;
        $doctor = $this->doctors->with(['educations','experiences'])->findOrFail($doctorId);
       
        $department = Department::where('id',$doctor->dep_id)->first();
        $permanentDistrict = District::where('id',$doctor->permanent_district_id)->first();
        $permanentProvince = District::where('id',$doctor->permanent_province_id)->first();
        $temporaryDistrict = District::where('id',$doctor->temporary_district_id)->first();
        foreach ($doctor->educations as $education) {
            $degreeId = $education->degree;
            $degrees = config('doctor_degree.degree');

            if(isset($degrees[$degreeId])){
                $degree = $degrees[$degreeId];
            }
        }        
       
        // dd($doctor);
        return view('doctorDashboard.profile.index',compact(
            'user',
            'doctor',
            'department',
            'permanentDistrict',
            'permanentProvince',
            'temporaryDistrict',
            'degree',
        ));
    }

    public function edit(){
        $user = Auth::user();
        $doctorId = $user->doc_id;
        // dd($doctorId);
        $doctor = $this->doctors->with(['educations','experiences'])->findOrFail($doctorId);
        // dd($doctor);
        $province = Province::findOrFail($doctor->permanent_province_id);
        $districtsBasedOnProvince = $province->districts;
        
        $district = District::findOrFail($province->id);
        $muncipalitiesBasedOnDistrict = $district->Municipalities;
        // dd($doctor->permanent_municipality_id);
        
       
        // dd($doctor);
        return view('doctorDashboard.profile.edit',compact(
            'user',
            'doctor',
            'districtsBasedOnProvince',
            'muncipalitiesBasedOnDistrict',
           
        ));
        
    }

    public function update(DoctorRequest $request,$id)
    {
        // dd($request->all());
        $validatedDoctor = $request->validated();
        $doctor = $this->doctors->with(['educations','experiences'])->findOrFail($id);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
        
            // Remove previous image file if it exists
            if($doctor->image_file){
                $previous_image_file = public_path($doctor->image_file);
                if(file_exists($previous_image_file)) {
                    unlink($previous_image_file);   
                }
            }
        
            $file->move(public_path('dashboard/assets/images/doctors'), $fileName);
            $validatedDoctor['image_file'] = 'dashboard/assets/images/doctors'.'/'.$fileName;
        }


        $doctor->update($validatedDoctor);

        

        //education
        if ($request->degree) {
            foreach ($request->degree as $key => $degree) {
                $education = $doctor->educations[$key]; 
                $education->update([
                    'doc_id' => $doctor->id,
                    'degree' => $request->degree[$key],
                    'specialization' => $request->specialization[$key],
                    'institution' => $request->institution[$key],
                    'completion_year_bs' => $request->completion_year_bs[$key],
                    'completion_year_ad' => $request->completion_year_ad[$key],
                    'obtained_marks' => $request->obtained_marks[$key],
                ]);
            }
        }

        // Create experience
        if ($request->organization) {
            foreach ($request->organization as $key => $organization) {
                $experience = $doctor->experiences[$key];
                $experience->update([
                    'doc_id' => $doctor->id,
                    'organization' => $request->organization[$key],
                    'position' => $request->position[$key],
                    'start_date_bs' => $request->start_date_bs[$key],
                    'start_date_ad' => $request->start_date_ad[$key],
                    'end_date_bs' => $request->end_date_bs[$key],
                    'end_date_ad' => $request->end_date_ad[$key],
                    'description' => $request->description[$key],
                ]);
            }
        }
        return redirect()->route('profile')->with('message','Doctor updated successfully!!!');
    }

   
}
