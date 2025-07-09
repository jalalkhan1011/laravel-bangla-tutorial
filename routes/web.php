<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/form',[FormController::class,'showForm']);
// Route::post('/form',[FormController::class,'submit'])->name('submit.form');
/////
Route::get('/students',[StudentController::class,'insertStudent']);
Route::get('/all-students',[StudentController::class,'allStudents']);
Route::get('/student-update/{id}',[StudentController::class,'updateStudent']);
Route::get('/student-delete/{id}',[StudentController::class,'deleteStudent']);

// Route::get('/cards',[HomeController::class,'card']);

// Route::get('/hello',function(){
//     return "Hello From KhansIT";
// });

// Route::get('/home',function(){
//     return view('home');
// });

// Route::get('/home',[HomeController::class,'index']);

// Route::get('/user/{name}',function($name){
//     return "User name is:$name";
// });

// Route::get('/user/{name}',[HomeController::class,'show']);

// Route::resource('/products',ProductController::class);