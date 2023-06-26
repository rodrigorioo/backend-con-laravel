<?php

namespace App\Services;

use App\Data\ProductoCarritoData;
use App\Http\Requests\FinalizarCompraAPIRequest;
use App\Models\Compra;
use App\Models\CompraProducto;

class CompraService {

    /**
     * @param FinalizarCompraAPIRequest $request
     * @return Compra
     */
    public function crearCompra(FinalizarCompraAPIRequest $request): Compra
    {
        // Crear compra
        $compra = new Compra();
        $compra->fill($request->validated());
        $compra->save();

        // Crear productos de la compra
        /** @var ProductoCarritoData $productoCarrito */
        foreach($request->productosCarrito as $productoCarrito) {
            CompraProducto::create([
                'compra_id' => $compra->id,
                'producto_id' => $productoCarrito->id,
                'cantidad' => $productoCarrito->cantidad,
                'precio' => $productoCarrito->producto->precio,
            ]);
        }

        return $compra;
    }

}