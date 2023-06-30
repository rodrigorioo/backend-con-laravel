<?php

namespace App\Http\Controllers\API;

use App\Data\ProductoCarritoData;
use App\Enums\MetodoDeEnvio;
use App\Http\Controllers\Controller;
use App\Http\Requests\CalcularTotalCarritoAPIRequest;
use App\Http\Requests\FinalizarCompraAPIRequest;
use App\Models\Compra;
use App\Models\CompraProducto;
use App\Models\Producto;
use App\Services\CarritoService;
use App\Services\CompraService;
use App\Services\MercadoPagoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __construct(
        private CompraService $compraService,
        private CarritoService $carritoService,
        private MercadoPagoService $mercadoPagoService
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
        $preferencia = $this->mercadoPagoService->crearPreferencia($compra);

        // Enviar los mails
        // TODO:

        return new JsonResponse([
            'mensaje' => 'Compra finalizada',
            'init_point' => $preferencia->init_point,
        ]);
    }
}
