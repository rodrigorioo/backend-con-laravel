<?php

namespace App\Observers;

use App\Mail\CompraPagada;
use App\Models\Compra;
use Illuminate\Support\Facades\Mail;

class CompraObserver
{
    /**
     * Handle the Compra "created" event.
     */
    public function created(Compra $compra): void
    {
        //
    }

    /**
     * Handle the Compra "updated" event.
     */
    public function updated(Compra $compra): void
    {
        if($compra->pagado) {
            Mail::to($compra->email)->send(new CompraPagada($compra));
        }
    }

    /**
     * Handle the Compra "deleted" event.
     */
    public function deleted(Compra $compra): void
    {
        //
    }

    /**
     * Handle the Compra "restored" event.
     */
    public function restored(Compra $compra): void
    {
        //
    }

    /**
     * Handle the Compra "force deleted" event.
     */
    public function forceDeleted(Compra $compra): void
    {
        //
    }
}
