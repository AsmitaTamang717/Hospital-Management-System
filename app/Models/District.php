<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable=[
        'district_name_eng',
        'district_name_nep',
        'code',
        'province_id',
    ];

    public function municipalities(){
        return $this->hasMany(Municipality::class,'district_id','id');
    }


    public function province(){
        return $this->belongsTo(Province::class,'province_id');
    }

    public function doctors_permanent(){
        return $this->hasMany(Doctor::class,'permanent_district','id');
    }

    public function doctors_temporary(){
        return $this->hasMany(Doctor::class,'temporary_district','id');
    }
}
