<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// guest visit
Route::get('/', [HomeController::class, 'index']);

// user logged in
Route::get('/home', [HomeController::class, 'redirect']);

// logout route
Route::group(['middleware' => ['auth']], function() {
   Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});

// admin
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);

// jetstream 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
