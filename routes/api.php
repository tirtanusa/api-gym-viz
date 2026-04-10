<?php

use App\Http\Controllers\Api\RoutineController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ExerciseDetailController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('exercise', ExerciseController::class)->except(['create', 'edit']);
    Route::apiResource('exercise-details', ExerciseDetailController::class)->except(['create', 'edit']);
    Route::apiResource('users', UserController::class);
    Route::apiResource('routines', RoutineController::class)->except(['create', 'edit']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});


