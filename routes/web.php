<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HOME
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

// CATEGORIAS
Route::prefix('categorias')->group(function() {

    Route::get('/', [\App\Http\Controllers\CategoriaController::class, 'index']);

    Route::get('crear-categoria', [\App\Http\Controllers\CategoriaController::class, 'crearCategoria']);
    Route::get('{nombreCategoria}', [\App\Http\Controllers\CategoriaController::class, 'categoria']);
});

// PRODUCTOS
Route::get('productos/crear-producto', [\App\Http\Controllers\ProductoController::class, 'crearProducto']);
Route::get('productos/ver-producto/{producto}', [\App\Http\Controllers\ProductoController::class, 'verProducto']);
Route::get('productos/{categoria?}', [\App\Http\Controllers\ProductoController::class, 'index']);

