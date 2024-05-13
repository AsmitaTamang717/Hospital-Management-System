<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\DoctorDashboard\doctorDashboardController;
use App\Http\Controllers\DoctorDashboard\ScheduleController;
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

Route::get('/hospital/logout',[LogoutController::class,'logout'])->name('logout');
//////////////////////Authenticated user/////////////////////////////////////////////
Route::middleware(['auth','checkRole'])->group(function () {
    
    
    Route::get('/hospital/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    
    ///////////////////////Department routes////////////////////////
    Route::get('/hospital/department/trash',[DepartmentController::class,'trashDepartment'])->name('trashDepartment');   
    Route::get('/hospital/department/trash-restore/{id}',[DepartmentController::class,'trashRestore'])->name('trashRestoreDepartment');
    Route::delete('/hospital/department/trash-delete/{id}',[DepartmentController::class,'trashDelete'])->name('trashDeleteDepartment');
    Route::resource('/hospital/department', DepartmentController::class); 
    
    /////////////////////////////User routes//////////////////////////////////
    Route::get('/hospital/user/trash', [UserController::class,'trashUser'])->name('trashUser');
    Route::get('/hospital/user/trash-restore/{id}',[UserController::class,'trashRestore'])->name('trashRestoreUser');
    Route::delete('/hospital/user/trash-delete/{id}',[UserController::class,'trashDelete'])->name('trashDeleteUser');
    Route::resource('/hospital/user', UserController::class);

    //////////////////////////////Doctor routes///////////////////////////////////////////
    Route::get('/hospital/doctor/trash', [DoctorController::class,'trashDoctor'])->name('trashDoctor');
    Route::get('/hospital/doctor/trash-restore/{id}', [DoctorController::class,'trashRestore'])->name('trashRestoreDoctor');
    Route::delete('/hospital/doctor/trash-delete/{id}', [DoctorController::class,'trashDelete'])->name('trashDeleteDoctor');
    Route::resource('/hospital/doctor', DoctorController::class);
    Route::get('/hospitalDistricts/{provinceid}', [DoctorController::class, 'getDistricts'])->name('district');
    Route::get('/hospitalMunicipalities/{districtid}', [DoctorController::class, 'getMunicipalities'])->name('municipality');
    
});


//doctor dashboard
Route::middleware('auth')->group(function(){
    // Route::get('/hospital/doctor-dashboard/schedule',[ScheduleController::class,'index'])->name('schedule');
    Route::resource('/hospital/doctor-dashboard/schedule',ScheduleController::class);
    
    Route::resource('/hospital/doctor-dashboard',DoctorDashboardController::class);

});


