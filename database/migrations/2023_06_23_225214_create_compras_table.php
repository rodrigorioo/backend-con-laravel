<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->text('nombre');
            $table->text('apellido');
            $table->text('email');
            $table->text('telefono');

            $table->text('metodo_de_envio');
            $table->text('direccion')->nullable();
            $table->text('codigo_postal')->nullable();
            $table->text('localidad')->nullable();
            $table->text('provincia')->nullable();
            $table->text('pais')->nullable();

            $table->boolean('pagado')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
