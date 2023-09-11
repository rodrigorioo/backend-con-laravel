<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $categorias = Categoria::select([
            'id', 'nombre',
        ])
            ->with([
                'productos:id,categoria_id,nombre',
            ])
            ->get();

        return view('home', [
            'categorias' => $categorias,
        ]);
    }
}
