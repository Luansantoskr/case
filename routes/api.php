<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegistroController;
use App\Models\RegistroCliente;
use Facade\FlareClient\Http\Client;

// Rotas abertas para receber os dados do cliente e vacinas.
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cliente', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::get('/vacinas', [VacinaController::class, 'index']);
Route::get('/vacinas/{id}', [VacinaController::class, 'show']);
Route::get('registro/{id}', [RegistroController::class, 'show']);

// Rotas protegidas, necessitam de login.
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/cliente', [ClienteController::class, 'store']);
    Route::put('/cliente/{id}', [ClienteController::class, 'update']);
    Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
    Route::post('/registro/segunda', [RegistroController::class, 'segundaDose']);
    Route::post('/registro', [RegistroController::class, 'store']);
    Route::post('/vacina', [VacinaController::class, 'store']);
    Route::put('/vacina/{id}', [VacinaController::class, 'update']);
    Route::delete('/vacina/{id}', [VacinaController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
