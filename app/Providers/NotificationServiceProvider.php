<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationServiceProvider extends ServiceProvider
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
        View::composer('doctorDashboard.partials.navbar', function ($view) {
            $user = Auth::user(); 
            // $notifications = collect(); // Initialize as an empty collection

            if ($user) {
                $doctor = Doctor::find($user->doc_id);
            
            //     if($doctor){
            //         $notifications = $doctor ? $doctor->notifications : collect();
            //         dd($notifications);
            //     }
            //     }
            if($doctor){
            $notifications = DB::table('notifications')->where('notifiable_id', $user->doc_id)->where('read_at',null)->get();
            $view->with('notifications',$notifications);
        }
        }

          
        });
    }
}
