<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CallBackController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpecialController;

Route::get('/', [ApplicationController::class, 'showIndex']);

Route::post('/', [ApplicationController::class, 'store']);

Route::get('/c', [CallBackController::class, 'index']);
Route::post('/c', [CallBackController::class, 'storecall']);


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/special', [SpecialController::class, 'index']);

