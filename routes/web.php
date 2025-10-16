<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentCourseController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
// Route::post('/register',[AuthController::class,'register']);
// Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
// Route::post('/login',[AuthController::class,'login']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');  
// Route::get('/admin-dashboard',[AuthController::class,'adminDashboard'])->middleware('checkAdmin');
// Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () { 
    Route::resource('/students', StudentController::class);
    Route::resource('/profiles',ProfileController::class);
    Route::resource('/users',UserController::class);
    Route::get('/student-course/list',[StudentCourseController::class,'index'])->name('student.course.index');
    Route::get('/student-course/create',[StudentCourseController::class,'create'])->name('student.course.create');
    Route::post('/student-course/store',[StudentCourseController::class,'store'])->name('student.course.store');
    Route::get('/student-course/{id}/edit',[StudentCourseController::class,'edit'])->name('student.course.edit');
    Route::put('/student-course/{id}',[StudentCourseController::class,'update'])->name('student.course.update');
    Route::delete('/student-course/{id}',[StudentCourseController::class,'destroy'])->name('student.course.delete');
    Route::get('/country/{id}/passport',[CountryController::class,'show']);
});
