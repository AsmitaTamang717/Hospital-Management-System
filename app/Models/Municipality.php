<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;
    protected $fillable=[
        'municipality_name_nep',
        'code',
        'district_id',
        'muni_type_id'
        
    ];
    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function muni_type()
    {
        return $this->belongsTo(Muni_type::class, 'muni_type_id');
    }
}
