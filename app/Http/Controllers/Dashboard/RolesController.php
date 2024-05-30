<?php

namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public $roles,$permissions;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Role $roles, Permission $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
        $this->middleware('permission:view role', ['only' => ['index', 'show']]);
        $this->middleware('permission:create role', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete role', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles = $this->roles->all();
        return view('dashboard.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        $roles = $request->validated();
        if($roles){
            $this->roles->create($roles);
            
        }
        return redirect()->route('roles.index')->with('message','Roles created successfully');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = $this->roles->findOrFail($id);
        $permissions = $this->permissions->all();
        $rolePermissions = $role->permissions->pluck('name')->toArray(); 
        
        return view('dashboard.roles.edit',compact('permissions','role','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolesRequest $request, string $id)
    {
       
        $validatedData = $request->validated();
        $role = $this->roles->findOrFail($id);
        $role->update($validatedData);
        $role->syncPermissions($validatedData['permissions']);
        return redirect()->route('roles.index')->with('message','Roles updated successfully');
        // dd($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $role = $this->roles->findOrFail($id);
        if($role){
           
            $role->delete();
        }
        return redirect()->route('roles.index')->with('message','Roles deleted  successfully');

    }
}
