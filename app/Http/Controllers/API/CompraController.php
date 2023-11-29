<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompraController extends Controller
{
    public function ultimasCompras() {
        $compras = Compra::orderBy('id', 'desc')
            ->take(10)
            ->get();

        return new JsonResponse($compras);
    }
}
