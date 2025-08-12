<?php

use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;





Route::post('/teste', function (Request $request) {

}); 



Route::prefix('times')->group(function() {

    Route::delete('/{id}/delete',[TimeController::class,'destroy']);
    Route::get('/', [TimeController::class, 'index']);
    Route::post('/', [TimeController::class, 'store']);
    Route::get('{time}', [TimeController::class, 'show']);
    Route::put('{time}', [TimeController::class, 'update']);

    
//   Route::delete('{time}', [TimeController::class, 'destroy']);
});