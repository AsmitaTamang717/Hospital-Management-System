<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public $menus,$pages;
    public function __construct(Menu $menus,Page $pages){
        $this->menus = $menus;
        $this->pages = $pages;
    }
    public function index(){
        $menus = $this->menus->all();
        $pages = $this->pages->all();
        return view('frontend.index',compact('menus','pages'));
    }
    public function translateLanguage($language,Request $request){
        // dd($language,$request->all());
        App::setLocale($language);
        session()->put('language',$language);
        return back();
    }

    public function department(){
        return view('frontend.department');
    }

    public function about(){
        return view('frontend.about');
    }

    public function services(){
        return view('frontend.services');
    }
    public function doctor(){
        return view('frontend.doctor');
    }
    public function contact(){
        return view('frontend.contact');
    }



}
