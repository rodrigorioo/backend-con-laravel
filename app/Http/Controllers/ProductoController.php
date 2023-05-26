<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function crearProducto() {
        $producto = new Producto();
        $producto->nombre = "Cebolla";
        $producto->categoria_id = 2;
        $producto->save();
    }

    public function index(?string $categoria = null) {

        if(!is_null($categoria)) {
            $categoria = Categoria::where('nombre', $categoria)
                ->first();

            if(empty($categoria)) {
                dd("No existe la categoría");
            } else {
                $productos = Producto::where('categoria_id', $categoria->id)
                    ->get();
            }

        } else {
            $productos = Producto::all();
        }

        return view('productos', [
            'productos' => $productos,
        ]);
    }

    public function verProducto(Producto $producto) {

        return view('producto', [
            'producto' => $producto,
        ]);
    }
}
