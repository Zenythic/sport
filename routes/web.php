<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BettingController;

Route::get('/', [BettingController::class, 'show']);

use App\Http\Controllers\AuthController;
Route::post('/auth/check-login', [AuthController::class, 'checkLogin']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard'); 
});