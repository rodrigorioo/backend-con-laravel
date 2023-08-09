<?php

namespace App\Console\Commands;

use App\Models\Compra;
use Carbon\Carbon;
use Illuminate\Console\Command;

class EliminarCompras extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eliminar-compras {dias=31}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina las compras que no estén pagadas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dias = intval($this->argument('dias'));

        // Obtenemos la fecha de hoy y las compras no pagadas
        $fechaHoy = Carbon::now();
        $compras = Compra::where('pagado', false)
            ->get();

        foreach($compras as $compra) {

            // Parseamos la fecha de la compra y obtenemos la diferencia de días
            $fechaCompra = Carbon::parse($compra->created_at);
            $diferenciaDeDias = $fechaHoy->diffInDays($fechaCompra);

            // Si la diferencia entre días es mayor o igual a 31, eliminamos la compra
            if($diferenciaDeDias >= $dias) {
                $compra->delete();
            }
        }
    }
}
