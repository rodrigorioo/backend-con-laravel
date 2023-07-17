<?php

namespace App\Listeners;

use App\Services\CompraService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalcularTotalCompra
{
    /**
     * Create the event listener.
     */
    public function __construct(private CompraService $compraService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $compra = $event->compra;

        // Calcular el total de la compra
        $compra->total = $this->compraService->calcularTotal($compra->productos);
        $compra->save();
    }
}
