<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorExperience extends Model
{
    protected $table = 'experience';
    use SoftDeletes;
    protected $fillable=[
        'doc_id',
        'organization',
        'position',
        'start_date_bs',
        'start_date_ad',
        'end_date_bs',
        'end_date_ad',
        'description',
    ];
    public function doctor(){
        $this->belongsTo(Doctor::class);
    }
}
