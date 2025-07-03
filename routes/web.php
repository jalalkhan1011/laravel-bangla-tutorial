<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello',function(){
    return "Hello From KhansIT";
});

// Route::get('/home',function(){
//     return view('home');
// });

Route::get('/home',[HomeController::class,'index']);

// Route::get('/user/{name}',function($name){
//     return "User name is:$name";
// });

Route::get('/user/{name}',[HomeController::class,'show']);