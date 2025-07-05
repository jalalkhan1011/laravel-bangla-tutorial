<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cards',[HomeController::class,'card']);

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