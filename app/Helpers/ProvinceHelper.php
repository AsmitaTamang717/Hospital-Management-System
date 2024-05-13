<?php
namespace App\Helpers;
use App\Models\Province;

class ProvinceHelper{

    protected $provinces;
    public function __construct(Province $provinces)
    {
        $this->provinces = $provinces;
    }
    public function dropdown(){
        $provinces = $this->provinces->orderBy('id','desc')-> pluck('english_name','id');
        return $provinces;
    }

    public function provinceRelatedToDistrict(){
     

    }

    

}
?>