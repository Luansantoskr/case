<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegistroController;
use Facade\FlareClient\Http\Client;

// Rotas abertas para receber os dados do cliente e vacinas.
Route::get('/cliente', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::get('/vacinas', [VacinaController::class, 'index']);
Route::get('/vacinas/{id}', [VacinaController::class, 'show']);

// Rotas protegidas, necessitam de login.
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/cliente', [ClienteController::class, 'store']);
    Route::put('/cliente/{id}', [ClienteController::class, 'update']);
    Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
    Route::post('/registro_cliente', [RegistroCliente::class, 'store']);
    Route::post('/registro', [RegistroController::class, 'store']);
    Route::post('/vacinas', [VacinaController::class, 'store']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
