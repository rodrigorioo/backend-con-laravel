<?php

namespace App\Providers;

use App\Models\Compra;
use App\Observers\CompraObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Observers
        Compra::observe(CompraObserver::class);
    }
}
