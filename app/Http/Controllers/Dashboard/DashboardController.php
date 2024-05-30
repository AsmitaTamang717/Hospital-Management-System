<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
class DashboardController extends Controller
{
    protected $doctors, $departments, $patients, $users;
    public function __construct(Doctor $doctors, Department $departments, Patient $patients, User $users )
    {
        $this->doctors = $doctors;
        $this->departments = $departments;
        $this->patients = $patients;
        $this->users = $users;
    }
    public function index(){
        $doctorCount = $this->doctors->count();
        $departmentCount = $this->departments->count();
        $patientCount = $this->patients->count();
        $userCount = $this->users->count();
        return view('dashboard.index',compact(
            'doctorCount',
            'departmentCount',
            'patientCount',
            'userCount'
        ));
    }
    
}
