<?php

use App\Http\Controllers\API\CarritoController;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\CompraController;
use App\Http\Controllers\API\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Productos
Route::apiResource('productos', ProductoController::class);

Route::prefix('carrito')->group(function() {
    Route::post('calcular-total', [CarritoController::class, 'calcularTotal']);
    Route::post('finalizar-compra', [CarritoController::class, 'finalizarCompra']);
});

Route::get('compras/ultimas-compras', [CompraController::class, 'ultimasCompras']);

Route::prefix('clientes')->group(function () {
    Route::post('ingresar', [ClienteController::class, 'ingresar']);
});




