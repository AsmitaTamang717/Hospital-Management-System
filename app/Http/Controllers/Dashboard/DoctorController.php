<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Models\District;
use App\Models\Doctor;
use App\Models\DoctorEducation;
use App\Models\DoctorExperience;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $doctors,$doctorEducation,$doctorExperience,$users;
    public function __construct(Doctor $doctors,DoctorEducation $doctorEducation, DoctorExperience $doctorExperience, User $users)
    {
        $this->doctors = $doctors;
        $this->doctorEducation = $doctorEducation;
        $this->doctorExperience = $doctorExperience;
        $this->users = $users;

    }


    
    public function index()
    {
       
        $doctors = $this->doctors->with('educations','experiences')->get();
        return view('dashboard.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
    
       

    // DB::beginTransaction();
    
    try {
        $validatedDoctor = $request->validated();

        // Upload image
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('dashboard/assets/images/doctors'), $fileName);
            $validatedDoctor['image_file'] = 'dashboard/assets/images/doctors'.'/'.$fileName;
        } 

        // Create doctor
        
        
        $doctor = $this->doctors->create($validatedDoctor);

        // Create education
        if ($request->degree) {
            foreach ($request->degree as $key => $degree) {
                $this->doctorEducation->create([
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
                $this->doctorExperience->create([
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

        // create user
        $role_id = 2;
        $this->users->create([
            'role_id' => $role_id,
            'doc_id' => $doctor->id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // DB::commit();
        return redirect()->route('doctor.index')->with('message','Doctor added successfully!!!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', $e->getMessage());
    }
}

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = $this->doctors->with('educations','experiences')->find($id);
        return view('dashboard.doctor.view',['doctor'=>$doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $doctor = $this->doctors->with(['educations','experiences'])->findorFail($id);
        $province = Province::findOrFail($doctor->permanent_province_id);
        $districtsBasedOnProvince = $province->districts;
        // dd($districtsBasedOnProvince);
        $district = District::findOrFail($province->id);
        $muncipalitiesBasedOnDistrict = $district->Municipalities;
        // dd( $muncipalitiesBasedOnDistrict);

        
        $educations = $doctor->educations;
        // dd($education);
        $experiences = $doctor->experiences;


        return view('dashboard.doctor.edit',compact('doctor','districtsBasedOnProvince','muncipalitiesBasedOnDistrict','educations','experiences'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, $id)
    {
        // dd($request->all());
        $validatedDoctor = $request->validated();
        $doctors = $this->doctors->findorFail($id);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
        
            // Remove previous image file if it exists
            if($doctors->image_file){
                $previous_image_file = public_path($doctors->image_file);
                if(file_exists($previous_image_file)) {
                    unlink($previous_image_file);   
                }
            }
        
            $file->move(public_path('dashboard/assets/images/doctors'), $fileName);
            $validatedDoctor['image_file'] = 'dashboard/assets/images/doctors'.'/'.$fileName;
        }


        $doctor = $doctors->update($validatedDoctor);

        //education
        if ($request->degree) {
            foreach ($request->degree as $key => $degree) {
                $this->doctorEducation->update([
                    // 'doc_id' => $doctor->id,
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
                $this->doctorExperience->update([
                    // 'doc_id' => $doctor->id,
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

        return redirect()->route('doctor.index')->with('message','Doctor updated successfully!!!');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = $this->doctors->findorFail($id);
        if( $doctor->educations){
            foreach($doctor->educations as $education)
            {
                $education->delete();
            }
           
        }
        if( $doctor->experiences){
            foreach($doctor->experiences as $experience)
            {
                $experience->delete();
            }
           
        }
      
        $doctor->delete();
        return redirect()->route('doctor.index')->with('message','Doctor deleted successfully!!!');

    }

    public function getDistricts($provinceId) {
        $districts = District::where('province_id', $provinceId)->pluck('district_name_eng', 'id');
        return response()->json(['districts' => $districts]);
    }

    public function getMunicipalities($districtId) {
        $municipalities = Municipality::where('district_id', $districtId)->pluck('muni_name', 'id');
        return response()->json(['municipalities' => $municipalities]);
    }

    public function trashDoctor(){
        $trashedDoctors = $this->doctors->with(
            ['educations'=>function($query){
                $query->withTrashed();
            },
             'experiences'=>function($query){
                $query->withTrashed();
            }]
        )->onlyTrashed()->get();
    
       
        return view('dashboard.doctor.trash', [
            'trashedDoctors' => $trashedDoctors,
        ]);
    }

    public function trashRestore($id){
        $trashedDoctors = $this->doctors->onlyTrashed()->find($id);
        $trashedDoctors->restore();
        if($trashedDoctors){
            $this->doctorEducation->where('doc_id',$trashedDoctors->id)->restore();
            $this->doctorExperience->where('doc_id',$trashedDoctors->id)->restore();
        }
        return redirect()->route('doctor.index')->with('message','Doctor restored successfully!!!');

       
    }

    public function trashDelete($id){
        $trashedDoctors = $this->doctors->onlyTrashed()->find($id);
        
        if($trashedDoctors){
            $this->doctorEducation->where('doc_id',$trashedDoctors->id)->forceDelete();
            $this->doctorExperience->where('doc_id',$trashedDoctors->id)->forceDelete();
            $trashedDoctors->forceDelete();
        }
        return redirect()->route('doctor.index')->with('message','Doctor deleted successfully!!!');
    }

}
    
