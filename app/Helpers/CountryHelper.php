<?php
namespace App\Helpers;

use App\Models\Country;

class CountryHelper{

    protected $countries;
    public function __construct(Country $countries)
    {
        $this->countries = $countries;
    }
    public function dropdown(){
        $countries = $this->countries->orderBy('id','desc')-> pluck('english_name','id');
        return $countries;
    }
}
?>