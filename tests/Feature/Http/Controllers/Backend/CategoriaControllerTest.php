<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Http\Controllers\Backend\CategoriaController;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store(): void
    {
        // Preparación
        $user = User::factory()
            ->create();

        // Ejecución
        $data = [
            'nombre' => 'Categoria 1',
        ];

        $response = $this->actingAs($user)
            ->post(action([CategoriaController::class, 'store']), $data);

        // Asserts
        $response->assertStatus(302)
            ->assertRedirect(action([CategoriaController::class, 'index']))
            ->assertSessionHas('success');

        $categoria = Categoria::first();
        $this->assertNotEmpty($categoria);

        $this->assertEquals('Categoria 1', $categoria->nombre);
    }
}
