<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory,SoftDeletes;
   
   

    protected $fillable =[
        'dep_id',
        'country_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'phone',
        'image_file',
        'dob_bs',
        'dob_ad',
        'license_no',
        "temporary_province_id",
        'temporary_district_id',
        'temporary_municipality_id',
        'permanent_province_id',
        'permanent_district_id',
        'permanent_municipality_id',
        'temporary_street_name',
        'permanent_street_name',
    ];
     // department and doctor
     public function department(){
        return $this->belongsTo(Department::class,'doc_id');
    }

    public function educations(){
        return $this->hasMany(DoctorEducation::class,'doc_id','id');
    }
    public function experiences(){
        return $this->hasMany(DoctorExperience::class,'doc_id','id');
    }

    public function district(){
        return $this->belongsTo(District::class,'permanent_district_id');
    }

    public function schedules(){
        return $this->hasMany(Schedule::class,'doc_id','id');
    }

}
