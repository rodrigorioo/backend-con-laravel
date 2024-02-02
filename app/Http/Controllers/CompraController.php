<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function cancelarCompra(Request $request, Compra $compra) {

        if($request->hasValidSignature()) {
            dd("Se canceló la compra: ".$compra->id);
        }

        dd("La compra no existe");
    }

    public function verCompras() {
        return view('ver_compras');
    }
}
