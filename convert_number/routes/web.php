<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertController;

Route::get('/', [ConvertController::class, 'index']);
Route::post('/', [ConvertController::class, 'convert']);
