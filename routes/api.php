<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SegundaController;
use App\Http\Controllers\RegistroController;

// Rotas abertas para registro e login.
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Rotas privadas de cliente
Route::get('/cliente', [ClienteController::class, 'index']);
Route::get('/cliente/{id}', [ClienteController::class, 'show']);
Route::post('/cliente', [ClienteController::class, 'store']);
Route::put('/cliente/{id}', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy']);
    //Rotas de crud de registro
Route::get('registro/{id}', [RegistroController::class, 'show']);
Route::post('/segunda', [SegundaController::class, 'segundaDose']);
Route::post('/registro', [RegistroController::class, 'store']);
Route::put('/registro/{id}', [RegistroController::class, 'update']);
Route::delete('/registro/{id}', [RegistroController::class, 'destroy']);
    //Rotas de crud de vacina
Route::get('/vacinas', [VacinaController::class, 'index']);
Route::get('/vacinas/{id}', [VacinaController::class, 'show']);
Route::post('/vacina', [VacinaController::class, 'store']);
Route::put('/vacina/{id}', [VacinaController::class, 'update']);
Route::delete('/vacina/{id}', [VacinaController::class, 'destroy']);


// Rotas protegidas, necessitam de login.
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
