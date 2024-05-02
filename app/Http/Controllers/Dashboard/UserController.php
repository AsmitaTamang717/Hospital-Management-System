<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user[]=Hash::make($request->password);
        $user = $request->validated();

        $this->users->create($user);

        return redirect()->route('user.index')->with('message','User added successfully!!!');
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
        $user = $this->users->findorFail($id);

        return view('dashboard.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = $this->users->findorFail($id);

        $validatedUser = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email'
        ]

        );

        $user->update($validatedUser);

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
}
