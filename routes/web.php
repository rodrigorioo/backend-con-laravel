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
    });
});

Route::get('crear-usuario', function() {

    $user = new \App\Models\User();
    $user->name = "Rodrigo";
    $user->email = "rodrigo@mail.com";
    $user->password = \Illuminate\Support\Facades\Hash::make('123');
    $user->save();

});
