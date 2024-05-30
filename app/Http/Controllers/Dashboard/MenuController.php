<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $menus;
    public function __construct(Menu $menus){
        $this->menus = $menus;
    }
    public function index()
    {
        $menus = $this->menus->all();
        return view('dashboard.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        // dd($request->all());
        $validatedData = $request->validated();

        $validatedData['menu_name']=[
            'en'=> $validatedData['menu_name']['en'],
            'np'=> $validatedData['menu_name']['np']
        ];

        // dd($validatedData);

        $this->menus->create($validatedData);
        return redirect()->route('menu.index')->with('message','Menu created successfully!!!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
