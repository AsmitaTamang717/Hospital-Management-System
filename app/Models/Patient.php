<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Patient extends Model
{
    use HasFactory, SoftDeletes,Notifiable;
    protected $fillable = [
        'fullname',
        'gender',
        'dob',
        'age',
        'permanent_address',
        'temporary_address',
        'parent_name',
        'phone',
        'email',
        'message',
        'medical_history'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doc_id');
    }

    public function appointment(){
        return $this->hasOne(Appointment::class,'patient_id');
    }
}
