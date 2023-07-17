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

// PRODUCTOS
Route::prefix('productos')->group(function() {

    Route::prefix('{categoria}')->group(function() {

        Route::get('/', [\App\Http\Controllers\ProductoController::class, 'categoria']);
        Route::get('{producto}', [\App\Http\Controllers\ProductoController::class, 'verProducto']);
    });
});

Route::get('carrito', [\App\Http\Controllers\CarritoController::class, 'carrito']);

Route::get('cancelar-compra/{compra}', [\App\Http\Controllers\CompraController::class, 'cancelarCompra'])
    ->name('cancelar-compra');

/**
 * ADMIN
 */

Route::prefix('admin')->group(function() {

    Route::middleware('admin-logueado:0')->group(function() {
        Route::get('login', [\App\Http\Controllers\Backend\AdminController::class, 'login']);
        Route::post('login', [\App\Http\Controllers\Backend\AdminController::class, 'loguear']);
    });

    Route::middleware('admin-logueado:1')->group(function() {

        Route::get('/', [\App\Http\Controllers\Backend\AdminController::class, 'home']);
        Route::get('logout', [\App\Http\Controllers\Backend\AdminController::class, 'logout']);

        // Categorías
        Route::resource('categorias', \App\Http\Controllers\Backend\CategoriaController::class);

        // Productos
        Route::resource('productos', \App\Http\Controllers\Backend\ProductoController::class);

        // Compras
        Route::resource('compras', \App\Http\Controllers\Backend\CompraController::class);
    });
});

Route::get('crear-usuario', function() {

    $user = new \App\Models\User();
    $user->name = "Rodrigo";
    $user->email = "rodrigo@mail.com";
    $user->password = \Illuminate\Support\Facades\Hash::make('123456');
    $user->save();

});

Route::get('signature', function() {

    $url = \Illuminate\Support\Facades\URL::signedRoute('cancelar-compra', ['compra' => 34]);

    dd($url);
});
