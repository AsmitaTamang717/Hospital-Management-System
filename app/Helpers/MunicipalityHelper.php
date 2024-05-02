<?php
namespace App\Helpers;

use App\Models\Municipality;

class MunicipalityHelper{

    protected $municipalities;
    public function __construct(Municipality $municipalities)
    {
        $this->municipalities = $municipalities;
    }
    public function dropdown(){
        $municipalities = $this->municipalities->orderBy('id','desc')-> pluck('muni_name','id');
        return $municipalities;
    }
}
?>