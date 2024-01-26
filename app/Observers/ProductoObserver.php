<?php

namespace App\Observers;

use App\Models\Producto;
use App\Services\ProductoService;

class ProductoObserver
{
    public function __construct(private readonly ProductoService $productoService) {}

    /**
     * Handle the Producto "created" event.
     */
    public function created(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "updated" event.
     */
    public function updated(Producto $producto): void
    {
        if($producto->wasChanged('oferta')) {
            $this->productoService->actualizarCache();
        }
    }

    /**
     * Handle the Producto "deleted" event.
     */
    public function deleted(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "restored" event.
     */
    public function restored(Producto $producto): void
    {
        //
    }

    /**
     * Handle the Producto "force deleted" event.
     */
    public function forceDeleted(Producto $producto): void
    {
        //
    }
}
