<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\DoctorDashboard\ProfileController;
use App\Http\Controllers\Dashboard\DoctorScheduleController;
use App\Http\Controllers\DoctorDashboard\ScheduleController;
use App\Http\Controllers\DoctorDashboard\DoctorDashboardController;
use App\Http\Controllers\DoctorDashboard\PatientAppointmentController;

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

Route::get('/home',[HomeController::class,'index']);
Route::get('/department',[HomeController::class,'department']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/services',[HomeController::class,'services']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/doctor',[HomeController::class,'doctor']);
Route::get('/appointment',[AppointmentController::class,'index'])->name('appointment');
Route::get('/appointment/getDoctors/{deparmentId}',[AppointmentController::class,'getDoctors'])->name('getDoctors');
Route::get('/appointment/getSchedules/{selectedDoctorId}',[AppointmentController::class,'getSchedules'])->name('getSchedules');
Route::get('/appointment/confirmation',[AppointmentController::class,'confirm'])->name('confirm');
Route::post('/appointment/store',[AppointmentController::class,'store'])->name('appointmentStore');
Route::get('/appointment/checkQuota/{schedueId}',[AppointmentController::class,'checkQuota'])->name('checkQuota');
Route::post('/translateLanguage/{language}',[HomeController::class,'translateLanguage'])->name('translateLanguage');



// dashboard

Route::middleware('guest')->group(function () {
    Route::get('hospital/login',[LoginController::class,'index'])->name('login');
    Route::post('hospital/login',[LoginController::class,'authenticateUser'])->name('authenticateUser'); 
    Route::get('/hospital/forgetPassword',[ForgetPasswordController::class,'index'])->name('forgetPassword');
    Route::post('/hospital/resetPassword',[ForgetPasswordController::class,'resetPassword'])->name('resetPassword');
    Route::get('/hospital/resetPassword/{tokenId}',[ForgetPasswordController::class,'newPassword'])->name('newPassword');
    Route::post('/hospital/newPasswordSet',[ForgetPasswordController::class,'newPasswordStore'])->name('newPasswordSet');
    
});

Route::get('/hospital/logout',[LogoutController::class,'logout'])->name('logout');
//////////////////////Authenticated user/////////////////////////////////////////////
Route::group(['middleware' => ['role:admin|superadmin']], function (){    
// Route::group(['middleware' => ['checkRole']], function () {    
    
    Route::get('/hospital/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::post('/hospital/dashboard/search',[DoctorController::class,'searchFilter'])->name('searchFilter');
    
    ///////////////////////Department routes////////////////////////
    Route::get('/hospital/department/trash',[DepartmentController::class,'trashDepartment'])->name('trashDepartment');   
    Route::get('/hospital/department/trashRestore/{id}',[DepartmentController::class,'trashRestore'])->name('trashRestoreDepartment');
    Route::delete('/hospital/department/trash-delete/{id}',[DepartmentController::class,'trashDelete'])->name('trashDeleteDepartment');
    Route::resource('/hospital/department', DepartmentController::class); 
    
    /////////////////////////////User routes//////////////////////////////////
    Route::get('/hospital/user/trash', [UserController::class,'trashUser'])->name('trashUser');
    Route::get('/hospital/user/trashRestore/{id}',[UserController::class,'trashRestore'])->name('trashRestoreUser');
    Route::delete('/hospital/user/trashDelete/{id}',[UserController::class,'trashDelete'])->name('trashDeleteUser');
    Route::resource('/hospital/user', UserController::class);

    //////////////////////////////Doctor routes///////////////////////////////////////////
    Route::get('/hospital/doctor/trash', [DoctorController::class,'trashDoctor'])->name('trashDoctor');
    Route::get('/hospital/doctor/trashRestore/{id}', [DoctorController::class,'trashRestore'])->name('trashRestoreDoctor');
    Route::delete('/hospital/doctor/trashDelete/{id}', [DoctorController::class,'trashDelete'])->name('trashDeleteDoctor');
    Route::resource('/hospital/doctor', DoctorController::class);

    ///////////////////////////////////////////schedule routes//////////////////////////////////////////////
    Route::resource('/hospital/doctorSchedules', DoctorScheduleController::class);
    Route::resource('/hospital/roles',RolesController::class);
    Route::resource('/hospital/menu',MenuController::class);
    Route::resource('/hospital/pages',PageController::class);
    
});

Route::get('/hospitalDistricts/{provinceid}', [DoctorController::class, 'getDistricts'])->name('district');
Route::get('/hospitalMunicipalities/{districtid}', [DoctorController::class, 'getMunicipalities'])->name('municipality');

//doctor dashboard
// Route::middleware('checkRole')->group(function(){
    Route::group(['middleware' => 'role:doctor'], function () {    

    Route::resource('/hospital/doctorDashboard',DoctorDashboardController::class);
    // Route::get('/hospital/doctor-dashboard/schedule',[ScheduleController::class,'index'])->name('schedule');
    Route::get('/hospital/doctorDashboard/profile',[ProfileController::class,'index'])->name('profile');
    Route::get('/hospital/doctorDashboard/profileEdit',[ProfileController::class,'edit'])->name('profileEdit');
    Route::patch('/hospital/doctorDashboard/profileUpdate/{id}',[ProfileController::class,'update'])->name('profileUpdate');
    
    Route::resource('/hospital/doctorDashboard/schedule',ScheduleController::class);

    Route::patch('/hospital/doctorDashboard/availability/{id}',[ScheduleController::class,'updateAvailability'])->name('updateAvailability');
    

    Route::get('/hospital/doctorDashboardMarkRead',[DoctorDashboardController::class,'markRead'])->name('markRead');

    // Route::get('/doctorDashboard/patientAppointment', [PatientAppointmentController::class,'index'])->name('patientAppointment');
    Route::resource('/doctorDashboard/patientAppointment', PatientAppointmentController::class);

});


