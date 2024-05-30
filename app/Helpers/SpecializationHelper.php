<?php
namespace App\Helpers;


use App\Models\DoctorEducation;

class SpecializationHelper{

    protected $education;
    public function __construct(DoctorEducation $education)
    {
        $this->education = $education;
    }
    public function dropdown(){
        $specialization = $this->education->orderBy('id','desc')-> pluck('specialization','specialization');
        return $specialization;
    }
}
?>