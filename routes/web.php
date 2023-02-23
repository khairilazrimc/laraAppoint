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
Route::get('/home', [HomeController::class, 'redirect']);

// user log out
Route::group(['middleware' => ['auth']], function() {
   Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});



// guest
Route::post('/make_appointment', [HomeController::class, 'make_appointment']);
Route::get('/my_appointment', [HomeController::class, 'my_appointment'])->name('my_appointment');
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);



// admin
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
