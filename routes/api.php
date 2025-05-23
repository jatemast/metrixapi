<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

 



Route::post('/registro', [AuthController::class, 'register']);
Route::post('/inicio-sesion', [AuthController::class, 'login']);
 
 



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
