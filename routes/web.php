<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('rooms', RoomController::class);
Route::resource('guests', GuestController::class);
Route::resource('reservations', ReservationController::class);
