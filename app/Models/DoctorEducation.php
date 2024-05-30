<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorEducation extends Model
{
    protected $table = 'doctoreducation';
    use SoftDeletes;

    protected $fillable =[
        'doc_id',
        'degree',
        'specialization',
        'institution',
        'completion_year_bs',
        'completion_year_ad',
        'obtained_marks',
    ];

    public function doctor(){
        $this->belongsTo(Doctor::class,'doc_id','id');
    }
}
