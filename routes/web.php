<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);

// dashboard

Route::middleware('guest')->group(function () {
    Route::get('hospital/login',[LoginController::class,'index'])->name('login');
    Route::post('hospital/login',[LoginController::class,'authenticateUser'])->name('authenticateUser'); 
});


Route::middleware('auth')->group(function () {
    
    Route::get('/hospital/logout',[LogoutController::class,'logout'])->name('logout');

    // Route::redirect('hospital/login', '/hospital/dashboard');
    
    Route::get('/hospital/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::get('/hospital/department',[DepartmentController::class,'index'])->name('department');

    Route::resource('/hospital/department', DepartmentController::class);

    Route::resource('/hospital/user', UserController::class);

    Route::resource('/hospital/doctor', DoctorController::class);
});