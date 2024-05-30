<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;

class PageController extends Controller
{
    public $pages;
    /**
     * Display a listing of the resource.
     */
    public function __construct(Page $pages){
        $this->pages = $pages;
    }
    public function index()
    {
        $pages = $this->pages->all();
        return view('dashboard.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PagesRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['title']['en']);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('frontend/images/pages'),$fileName);
            $validatedData['image'] = 'frontend/images/pages'.'/'.$fileName;
        }

        $validatedData['title'] =[
            'en' => $validatedData['title']['en'],
            'np' => $validatedData['title']['np'],
        ];

        $validatedData['content'] =[
            'en' => $validatedData['content']['en'],
            'np' => $validatedData['content']['np'],
        ];

        $this->pages->create($validatedData);
        return redirect()->route('pages.index')->with('message','Page created successfully');

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
