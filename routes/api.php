<?php

use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::put('/tickets/{id}/status',[TicketController::class,'statusUpdate']);
Route::apiResource('/tickets',TicketController::class);
