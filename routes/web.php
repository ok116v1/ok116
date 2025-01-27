<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CallBackController;

Route::get('/', [ApplicationController::class, 'showIndex']);

Route::post('/', [ApplicationController::class, 'store']);

Route::get('/c', [CallBackController::class, 'index']);
Route::post('/c', [CallBackController::class, 'storecall']);

