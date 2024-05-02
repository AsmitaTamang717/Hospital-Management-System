<?php
namespace App\Helpers;
use App\Models\District;

class DistrictHelper{

    protected $districts;
    public function __construct(District $districts)
    {
        $this->districts = $districts;
    }
    public function dropdown(){
        $districts = $this->districts->orderBy('id','desc')-> pluck('district_name_eng','id');
        return $districts;
    }
}
?>