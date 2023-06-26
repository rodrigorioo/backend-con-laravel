<?php

namespace App\Data;

use App\Models\Producto;
use Spatie\LaravelData\Data;

class ProductoCarritoData extends Data {

    public Producto $producto;

    public function __construct(
        public int $id,
        public int $cantidad
    ) {
        $this->producto = Producto::find($this->id);
    }

}