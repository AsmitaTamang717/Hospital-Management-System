<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $table = 'schedules';
    use SoftDeletes;
    protected $fillable=[
        'doc_id',
        'date',
        'from',
        'to',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function generateIntervals(){
            $from = Carbon::parse($this->from);
            $to = Carbon::parse($this->to);
            $timeIntervals = [];
          
            // $intervals = CarbonPeriod::create($from,'30 minutes',$to);

          while($from < $to)
          {
            $endTime = $from->copy()->addMinutes(30);
            $timeIntervals[] = [
                'from' => $from->format('H:i A'),
                'to' => $endTime->format('H:i A')
            ];
            $from = $endTime;
          }
        //   dd($timeIntervals);
          return $timeIntervals;
         

        }

            
            

    }


