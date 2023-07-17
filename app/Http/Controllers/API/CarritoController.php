<?php

namespace App\Http\Controllers\API;

use App\Data\ProductoCarritoData;
use App\Enums\MetodoDeEnvio;
use App\Events\CompraFinalizada;
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
use Illuminate\Support\Facades\DB;

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

        // Forma 1
        $preferencia = DB::transaction(function() use($request) {

            // Crear la compra
            $compra = $this->compraService->crearCompra($request);

            // Integrar mercadopago
            $preferencia = $this->mercadoPagoService->crearPreferencia($compra);

            // Ejecutar evento de compra finalizada
            CompraFinalizada::dispatch($compra);

            return $preferencia;
        });

        // Forma 2
//        DB::beginTransaction();
//
//        // Crear la compra
//        try {
//            $compra = $this->compraService->crearCompra($request);
//        } catch (\Exception $e) {
//            DB::rollBack();
//
//            return new JsonResponse([
//                'mensaje' => $e->getMessage(),
//            ], 500);
//        }
//
//        // Integrar mercadopago
//        try {
//            $preferencia = $this->mercadoPagoService->crearPreferencia($compra);
//        } catch (\Exception $e) {
//            DB::rollBack();
//
//            return new JsonResponse([
//                'mensaje' => $e->getMessage(),
//            ], 500);
//        }
//
//        // Ejecutar evento de compra finalizada
//        CompraFinalizada::dispatch($compra);
//
//        DB::commit();

        // Enviar los mails
        // $this->compraService->enviarMail($compra, $preferencia->init_point);

        return new JsonResponse([
            'mensaje' => 'Compra finalizada',
            'init_point' => $preferencia->init_point,
        ]);
    }
}
