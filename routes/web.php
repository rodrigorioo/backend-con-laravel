<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoriaController;
use App\Http\Controllers\Backend\CompraController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Mail\CompraPagada;
use Illuminate\Support\Facades\Mail;
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
Route::get('/', [HomeController::class, 'index']);

// PRODUCTOS
Route::prefix('productos')->group(function() {

    Route::get('/', [ProductoController::class, 'categorias']);

    Route::prefix('{categoria}')->group(function() {

        Route::get('/', [ProductoController::class, 'categoria']);
        Route::get('{producto}', [ProductoController::class, 'verProducto']);
    });
});

Route::get('carrito', [CarritoController::class, 'carrito']);

Route::get('compras', [\App\Http\Controllers\CompraController::class, 'verCompras']);

Route::get('cancelar-compra/{compra}', [\App\Http\Controllers\CompraController::class, 'cancelarCompra'])
    ->name('cancelar-compra');

/**
 * ADMIN
 */

Route::prefix('admin')->group(function() {

    Route::middleware('admin-logueado:0')->group(function() {
        Route::get('login', [AdminController::class, 'login']);
        Route::post('login', [AdminController::class, 'loguear']);
    });

    Route::middleware('admin-logueado:1')->group(function() {

        Route::get('/', [AdminController::class, 'home']);
        Route::get('logout', [AdminController::class, 'logout']);

        // Categorías
        Route::resource('categorias', CategoriaController::class);

        // Productos
        Route::resource('productos', \App\Http\Controllers\Backend\ProductoController::class);

        // Compras
        Route::resource('compras', CompraController::class);
    });
});

Route::get('signature', function() {

    $url = \Illuminate\Support\Facades\URL::signedRoute('cancelar-compra', ['compra' => 34]);

    dd($url);
});
