<?php

namespace App\Services;

use App\Data\ProductoCarritoData;

class CarritoService {

    /**
     * @param array $productos
     * @return float
     */
    public function calculoTotal(array $productos): float
    {
        $total = 0;

        /** @var ProductoCarritoData $requestProducto */
        foreach($productos as $requestProducto) {
            $total += ($requestProducto->producto->precio * $requestProducto->cantidad);
        }

        return $total;
    }
}