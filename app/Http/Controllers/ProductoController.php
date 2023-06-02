<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function categoria(Categoria $categoria) {

        $productos = Producto::where('categoria_id', $categoria->id)
            ->get();

        return view('productos', [
            'productos' => $productos,
        ]);
    }

    public function verProducto(Categoria $categoria, Producto $producto) {
        return view('producto', [
            'producto' => $producto,
        ]);
    }
}
