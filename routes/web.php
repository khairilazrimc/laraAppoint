<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// jetstream routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// first visit
Route::get('/', [HomeController::class, 'index']);

// user logged in
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth');
// verified only can enter
// Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

// user log out
Route::group(['middleware' => ['auth']], function() {
   Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});



// guest
Route::get('/my_appointment', [HomeController::class, 'my_appointment'])->name('my_appointment');
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
Route::post('/make_appointment', [HomeController::class, 'make_appointment']);



// admin
Route::get('/show_appointments', [AdminController::class, 'showappointments']);
Route::get('/approve_appointment/{id}', [AdminController::class, 'approveappointment']);
Route::get('/disapprove_appointment/{id}', [AdminController::class, 'disapproveappointment']);
Route::get('/show_doctors', [AdminController::class, 'showdoctors']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'deletedoctor']);
Route::get('/add_doctor_view', [AdminController::class, 'adddoctorview']);
Route::post('/add_doctor_process', [AdminController::class, 'adddoctorprocess']);
Route::get('/update_doctor_view/{id}', [AdminController::class, 'updatedoctorview']);
Route::post('/update_doctor_process/{id}', [AdminController::class, 'updatedoctorprocess']);
