<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



//protected routes

Route::group(['middleware' => ['auth.sanctum']], function() {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('/tasks', TaskController::class);

});
