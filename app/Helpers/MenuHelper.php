<?php
namespace App\Helpers;

use App\Models\Menu;


class MenuHelper{

    protected $menus;
    public function __construct(Menu $menus)
    {
        $this->menus = $menus;
    }
    public function dropdown(){
        $menus = $this->menus->orderBy('id','desc')-> pluck('menu_name','id');
        return $menus;
    }
}
?>