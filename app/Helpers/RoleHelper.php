<?php
namespace App\Helpers;
use App\Models\Role;

class RoleHelper{

    protected $roles;
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }
    public function dropdown(){
        $roles = $this->roles->orderBy('id','desc')-> pluck('name','name');
        return $roles;
    }
}
?>