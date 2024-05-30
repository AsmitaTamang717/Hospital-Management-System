<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class WebsiteNavbarProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $menus = Menu::all();
            $view->with('menus',$menus);
        });
    }
}
