<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function() {
    Route::prefix('times')->group(function() {
        Route::delete('/{id}/delete', [TimeController::class,'destroy']);
        Route::get('/', [TimeController::class, 'index']);
        Route::post('/', [TimeController::class, 'store']);
        Route::get('{time}', [TimeController::class, 'show']);
        Route::put('{time}', [TimeController::class, 'update']);
    });


    Route::put('/updatePassword', [AuthController::class, 'updatePassword']);
});
