<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

// 1. PUBLIC ROUTES (No token required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/ping', function () {
    return response()->json(['message' => 'API is live!']);
});

// 2. PROTECTED ROUTES (Token required!)
// The 'auth:sanctum' middleware acts as a bouncer. No token = No access.
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('students', StudentController::class);
});
