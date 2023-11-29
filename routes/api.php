<?php

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
Route::apiResource('productos', \App\Http\Controllers\API\ProductoController::class);

Route::prefix('carrito')->group(function() {
    Route::post('calcular-total', [\App\Http\Controllers\API\CarritoController::class, 'calcularTotal']);
    Route::post('finalizar-compra', [\App\Http\Controllers\API\CarritoController::class, 'finalizarCompra']);
});

Route::get('compras/ultimas-compras', [\App\Http\Controllers\API\CompraController::class, 'ultimasCompras']);




