<?php

use App\Http\Controllers\CocheController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckPropietario;

Route::middleware(['web', 'auth', 'throttle:6,1', CheckPropietario::class])->group(function () {
    Route::apiResource('coches', CocheController::class);
});