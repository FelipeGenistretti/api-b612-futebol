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