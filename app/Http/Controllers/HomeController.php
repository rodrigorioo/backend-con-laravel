<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Services\ProductoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private readonly ProductoService $productoService) {}

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
            'ofertas' => $this->productoService->obtenerCache(),
        ]);
    }
}
