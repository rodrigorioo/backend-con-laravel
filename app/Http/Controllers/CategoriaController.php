<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request) {

        $nombre = $request->input('nombre');

        if(!is_null($nombre)) {
            $categorias = Categoria::where('nombre', 'LIKE', '%'.$nombre.'%')
                ->get();
        } else {
            $categorias = Categoria::orderBy('nombre', 'ASC')
                ->get();
        }

        return view('categorias', [
            'categorias' => $categorias,
        ]);
    }

    public function categoria(string $nombreCategoria) {
        echo "productos de ".$nombreCategoria;
    }

    public function crearCategoria() {
        $categoria = new Categoria();
        $categoria->nombre = "Lacteos";
        $categoria->save();
    }
}
