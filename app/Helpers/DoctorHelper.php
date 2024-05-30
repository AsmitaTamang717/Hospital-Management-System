<?php
namespace App\Helpers;

use App\Models\Doctor;

class DoctorHelper{

    protected $doctors;
    public function __construct(Doctor $doctors)
    {
        $this->doctors = $doctors;
    }
    public function dropdown(){
        $doctors = $this->doctors->orderBy('id','desc')-> pluck('name','id');
        return $doctors;
    }
}
?>