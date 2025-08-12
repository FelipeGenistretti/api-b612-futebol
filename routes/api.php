<?php

use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::delete('time/{id}',[TimeController::class,'delete']);



Route::post('/teste', function (Request $request) {
    return response()->json([
        'mensagem' => 'API funcionando!',
        'dados' => $request->all()
    ]);
});

Route::prefix('times')->group(function() {
    Route::get('/', [TimeController::class, 'index']);
    Route::post('/', [TimeController::class, 'store']);
    Route::get('{time}', [TimeController::class, 'show']);
    Route::put('{time}', [TimeController::class, 'update']);
    Route::delete('{time}', [TimeController::class, 'destroy']);
});