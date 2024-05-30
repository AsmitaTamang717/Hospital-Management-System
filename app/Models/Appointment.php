<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
   use Notifiable;
    protected $fillable =[
        'doc_id',
        'schedule_id',
        'patient_id',
        'time_interval',
        'status',
        'message'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doc_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
}
