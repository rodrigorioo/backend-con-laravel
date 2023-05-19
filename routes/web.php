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
Route::get('/', function () {

    $categorias = [
        "Fideos" => [
            'Moñitos',
            'Fideos largos',
            'Cabello de angel',
        ],
        "Verduras" => [
            'Tomates',
            'Lechuga',
            'Cebolla',
        ],
    ];

    $productos = [];
    $nombreCategorias = [];
    foreach($categorias as $nombreCategoria => $categoriaArray) {

        $nombreCategorias[] = $nombreCategoria;

        foreach($categoriaArray as $producto) {
            $productos[] = $producto;
        }
    }

    return view('home', [
        'productos' => $productos,
        'categorias' => $nombreCategorias,
    ]);
});

// CATEGORIAS
Route::prefix('categorias')->group(function() {

    Route::get('/', function(\Illuminate\Http\Request $request) {

        $categorias = [
            "Fideos" => [
                'Moñitos',
                'Fideos largos',
                'Cabello de angel',
            ],
            "Verduras" => [
                'Tomates',
                'Lechuga',
                'Cebolla',
            ],
        ];

        // Chequear si existe el parámetro de query "nombre"
        if(!is_null($request->input('nombre'))) {

            if(array_key_exists($request->input('nombre'), $categorias)) {
                echo 'Existe categoría';
            }

        } else {
            foreach($categorias as $nombreCategoria => $categoria) {
                echo $nombreCategoria.'<br>';
            }
        }
    });

    Route::get('{nombreCategoria}', function(string $nombreCategoria) {
        echo "productos de ".$nombreCategoria;
    });
});

Route::get('productos/{categoria?}', function(?string $categoria = null) {

    $categorias = [
        "Fideos" => [
            'Moñitos',
            'Fideos largos',
            'Cabello de angel',
        ],
        "Verduras" => [
            'Tomates',
            'Lechuga',
            'Cebolla',
        ],
    ];

    $productos = [];
    foreach($categorias as $categoriaArray) {
        foreach($categoriaArray as $producto) {
            $productos[] = $producto;
        }
    }

    return view('productos', [
        'productos' => $productos,
    ]);
});

