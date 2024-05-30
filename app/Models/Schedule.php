<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
  use Notifiable;
    protected $table = 'schedules';
    use SoftDeletes;
    protected $fillable=[
        'doc_id',
        'date',
        'from',
        'days',
        'to',
        'total_quota'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doc_id','id');
    }

    public function appointments(){
      return $this->hasMany(Appointment::class);
    }

    public function generateIntervals(){
            $date = Carbon::parse($this->date);
            $from = Carbon::parse($this->from);
            $to = Carbon::parse($this->to);
            $timeIntervals = [];
          
            // $intervals = CarbonPeriod::create($from,'30 minutes',$to);

          while($from < $to)
          {
            $endTime = $from->copy()->addMinutes(30);
            $timeIntervals[] = [
                'date' => $date->format('Y-m-d'),
                'from' => $from->format('H:i A'),
                'to' => $endTime->format('H:i A')
            ];
            $from = $endTime;
          }
        //   dd($timeIntervals);
          return $timeIntervals;
        }

    
      public function getFromAttribute($value){
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i A');
      }

      public function getToAttribute($value){
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i A');
      } 

    }


