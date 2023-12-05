<?php

namespace Tests\Feature\Http\Controllers\API;

use App\Enums\MetodoDeEnvio;
use App\Events\CompraFinalizada;
use App\Http\Controllers\API\CarritoController;
use App\Mail\CompraRealizada;
use App\Models\Compra;
use App\Models\Producto;
use Database\Seeders\CategoriaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CarritoControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_finalizar_compra(): void
    {
        // Preparación del test
        Mail::fake();

        $this->seed(CategoriaSeeder::class);
        $productos = Producto::factory(5)->create([
            'stock' => 20,
        ]);

        // Ejecución del test
        $productosRequest = $productos->reduce(function (array $acc, Producto $producto) {

            $acc[] = [
                'id' => $producto->id,
                'cantidad' => 1,
            ];

            return $acc;
        }, []);

        $dataRequest = [
            'productos' => $productosRequest,
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'email' => $this->faker->email,
            'telefono' => $this->faker->phoneNumber,
            'metodo_de_envio' => MetodoDeEnvio::RETIRO_EN_SUCURSAL,
        ];
        $response = $this->postJson(action([CarritoController::class, 'finalizarCompra']), $dataRequest);

        // Asserts
        $response->assertStatus(200);
        $responseData = $response->json();

        $this->assertArrayHasKey('mensaje', $responseData);
        $this->assertArrayHasKey('init_point', $responseData);

        Mail::assertSent(CompraRealizada::class);
    }
}
