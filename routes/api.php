<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;



Route::get('/teste', function() {
    return response()->json(['mensagem' => 'Olá Mundo']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/gerar-pdf',[PDFController::class, 'gerarPDF']);
Route::get('/gerar-pdf/{id}', [PDFController::class, 'gerarPDFTime']);



Route::middleware('auth:sanctum')->prefix('times')->group(function() {
    Route::post('/times/{time}/enviar-pdf', [PDFController::class, 'enviarPdfPorEmail']);
    Route::delete('/{id}/delete', [TimeController::class,'destroy']);
    Route::get('/', [TimeController::class, 'index']);
    Route::post('/', [TimeController::class, 'store']);
    Route::get('{time}', [TimeController::class, 'show']);
    Route::put('{time}', [TimeController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
