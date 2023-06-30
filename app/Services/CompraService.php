<?php

namespace App\Services;

use App\Data\ProductoCarritoData;
use App\Http\Requests\FinalizarCompraAPIRequest;
use App\Models\Compra;
use App\Models\CompraProducto;
use Illuminate\Support\Collection;

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
        $productosCompra = new Collection();
        /** @var ProductoCarritoData $productoCarrito */
        foreach($request->productosCarrito as $productoCarrito) {
            $productosCompra->push(
                CompraProducto::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $productoCarrito->id,
                    'cantidad' => $productoCarrito->cantidad,
                    'precio' => $productoCarrito->producto->precio,
                ])
            );
        }

        // Calcular total
        $compra->total = $this->calcularTotal($productosCompra);
        $compra->save();

        return $compra;
    }


    /**
     * @param Collection $compraProductos
     * @return float
     */
    public function calcularTotal(Collection $compraProductos): float {
        return $compraProductos->reduce(function (float $acc, CompraProducto $compraProducto) {
            return $acc + ($compraProducto->precio * $compraProducto->cantidad);
        }, 0);
    }

}