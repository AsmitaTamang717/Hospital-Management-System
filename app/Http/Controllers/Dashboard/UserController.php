<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $users;
    public function __construct(User $users){
        $this->users = $users;
    }
    public function index()
    {
        $users = $this->users->all();
        return view('dashboard.user.index',['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try{
            $validatedUser = $request->validated();
            $validatedUser['password']=Hash::make($request->password);
        // dd($validatedUser);
        $user = $this->users->create([
            'username' => $validatedUser['username'],
            'email' => $validatedUser['email'],
            'password' =>  $validatedUser['password'],
        ]);
        $user->syncRoles($request->role_name);
        DB::commit();
        return redirect()->route('user.index')->with('message','User added successfully!!!');
        }catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $viewUser = $this->users->find($id);
        return view('dashboard.user.view',['viewUser'=>$viewUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = $this->users->findorFail($id);
        $userRoles = $user->roles;
        // dd($userRoles);
        return view('dashboard.user.edit',compact('user','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = $this->users->findorFail($id);

        $validatedUser = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'role_name' => 'required'
        ]
        );

        // dd($validatedUser);
        $updatedUser = $user->update($validatedUser);
        $user->syncRoles($request->role_name);

        return redirect()->route('user.index')->with('message','User updated successfully!!!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $user = $this->users->findorFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('message','User deleted successfully!!!');


    }

    //retrieving soft deleted data
    public function trashUser(){
        $trashedUsers = $this->users->onlyTrashed()->get();
        return view('dashboard.user.trash',['trashedUsers' => $trashedUsers]);
    }

    //restoring soft deleted data
    public function trashRestore($id){
        $trashedUsers = User::onlyTrashed()->find($id);
        
        $trashedUsers->restore();
        return redirect()->route('user.index')->with('message','User restored successfully!!!');
    
    }

    //permanently deleting
    public function trashDelete($id){
        $trashedUsers = User::onlyTrashed()->find($id);
        
        $trashedUsers->forceDelete();
        return redirect()->route('user.index')->with('message','Trash deleted successfully!!!');
    
    }
}
