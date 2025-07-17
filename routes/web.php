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
// Route::get('/students',[StudentController::class,'index'])->name('student.index');
// Route::get('/student/create',[StudentController::class,'create'])->name('student.create');
// Route::post('/student/store',[StudentController::class,'store'])->name('student.store');
// Route::get('/student/show/{id}',[StudentController::class,'show'])->name('student.show');
// Route::get('/student/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
// Route::put('/student/update/{id}',[StudentController::class,'update'])->name('student.update');
// Route::delete('/student/delete/{id}',[StudentController::class,'delete'])->name('student.delete');

Route::resource('/students', StudentController::class);

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