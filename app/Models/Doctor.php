<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    // department and doctor
    public function department(){
        return $this->belongsTo(Department::class,'doc_id');
    }
   

    protected $fillable =[
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob_bs',
        'dob_ad',
        'license_no',
        'temporary_province_no',
        'temporary_district',
        'temporary_municipality_name',
        'permanent_province_no',
        'permanent_district',
        'permanent_municipality_name',
        'temporary_street_name',
        'permanent_street_name',
    ];

}
