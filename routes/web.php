<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class,'register']);
Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');  
Route::get('/admin-dashboard',[AuthController::class,'adminDashboard'])->middleware('checkAdmin');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::resource('/students', StudentController::class);
});
