<?php
namespace App\Helpers;
use App\Models\Muni_type;

class MuniTypeHelper{

    protected $muni_types;
    public function __construct(Muni_type $muni_types)
    {
        $this->muni_types = $muni_types;
    }
    public function dropdown(){
        $muni_types = $this->muni_types->orderBy('id','desc')-> pluck('name','id');
        return $muni_types;
    }
}
?>