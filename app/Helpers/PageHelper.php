<?php
namespace App\Helpers;

use App\Models\Menu;
use App\Models\Page;

class PageHelper{

    protected $pages;
    public function __construct(Page $pages)
    {
        $this->pages = $pages;
    }
    public function dropdown(){
        // $pages = $this->pages->orderBy('id','desc')-> pluck('title.en','slug');
        // return $pages;

        $pages = $this->pages->all();
        $pageList = $pages->mapWithKeys( function ($page) {
           $enPageName = isset($page['title']['en']) ? $page['title']['en'] : '';
           return [$page->id => $enPageName];
        });
        return $pageList;
    }
}
?>