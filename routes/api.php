<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\RepresentanteController;
use App\Http\Controllers\Api\QueryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('clientes', ClienteController::class);
Route::apiResource('cidades', CidadeController::class);
Route::apiResource('representantes', RepresentanteController::class);

Route::get('clientes/{clienteId}/representantes', [QueryController::class, 'getRepresentantesByCliente']);
Route::get('cidades/{cidadeId}/representantes', [QueryController::class, 'getRepresentantesByCidade']);