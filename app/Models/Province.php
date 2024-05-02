<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable =[
        'code',
        'nepali_name',
        'english_name',
    ];

    public function district(){
        return $this->hasMany(District::class,'district_id');
    }
}
