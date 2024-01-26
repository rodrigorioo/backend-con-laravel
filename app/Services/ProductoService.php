<?php

namespace App\Services;

use App\Models\Producto;
use Illuminate\Support\Facades\Cache;

class ProductoService {

    private function obtenerProductosEnOferta() {
        return Producto::where('oferta', 1)
            ->with([
                'categoria',
            ])
            ->get();
    }

    public function actualizarCache() {
        Cache::put('ofertas', $this->obtenerProductosEnOferta());
    }

    public function obtenerCache() {
        return Cache::rememberForever('ofertas', function() {
            return $this->obtenerProductosEnOferta();
        });
    }

}
