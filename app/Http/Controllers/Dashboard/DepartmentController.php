<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $departments;
    public function __construct(Department $departments)
    {
        $this->departments = $departments;
    }
    public function index()
    {
        $departments = $this->departments->all();
        return view('dashboard.department.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
       
        $department = $request->validated();
        
        $this->departments->create($department);
        return redirect()->route('department.index')->with('message','Department added successfully!!!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = $this->departments->findorFail($id);
        //$department = $this->departments->where('id',$id)->first();
        return view('dashboard.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $id)
    {
        $department = $this->departments->findorFail($id);
        $validatedDepartment = $request->validated();

        $department->update($validatedDepartment);
        return redirect()->route('department.index')->with('message','Department updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = $this->departments->findorFail($id);
        $department->delete();
        return redirect()->route('department.index')->with('message','Department deleted successfully!!!');
    }
}
