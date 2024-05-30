<?php
namespace App\Helpers;

use App\Models\Menu;
use App\Models\Module;

class ModuleHelper{

    protected $modules;
    public function __construct(Module $modules)
    {
        $this->modules = $modules;
    }
    public function dropdown(){
        $modules = $this->modules->orderBy('id','desc')-> pluck('module_name','id');
        return $modules;
    }
}
?>