<?php

use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;


Route::delete('time/{id}',[TimeController::class,'delete']);