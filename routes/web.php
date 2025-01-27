<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

Route::get('/', [ApplicationController::class, 'showIndex']);
Route::post('/', [ApplicationController::class, 'store']);