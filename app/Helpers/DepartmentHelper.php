<?php
namespace App\Helpers;
use App\Models\Department;


class DepartmentHelper{

    protected $departments;
    public function __construct(Department $departments)
    {
        $this->departments = $departments;
    }
    public function dropdown(){
        $roles = $this->departments->orderBy('id','desc')-> pluck('name','id');
        return $roles;
    }
}
?>