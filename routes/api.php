<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VacinaController;


Route::get('/', [ClienteController::class, 'index']);

Route::post('/clientes', [ClienteController::class, 'store']);

Route::post('/vacinas', [VacinaController::class, 'store']);

Route::get('/vacinas/{id}', [VacinaController::class, 'show']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
