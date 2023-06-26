<?php

namespace App\Http\Controllers\API;

use App\Data\ProductoCarritoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalcularTotalCarritoAPIRequest;
use App\Http\Requests\FinalizarCompraAPIRequest;
use App\Models\Compra;
use App\Models\CompraProducto;
use App\Models\Producto;
use App\Services\CarritoService;
use App\Services\CompraService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __construct(
        private CompraService $compraService,
        private CarritoService $carritoService
    ) {}

    public function calcularTotal(CalcularTotalCarritoAPIRequest $request) {
        return new JsonResponse([
            'total' => $this->carritoService->calculoTotal($request->productosCarrito),
        ]);
    }

    public function finalizarCompra(FinalizarCompraAPIRequest $request) {

        // Crear la compra
        $compra = $this->compraService->crearCompra($request);

        // Integrar mercadopago


        // Enviar los mails


        return new JsonResponse([
            'mensaje' => 'Compra finalizada'
        ]);
    }
}
