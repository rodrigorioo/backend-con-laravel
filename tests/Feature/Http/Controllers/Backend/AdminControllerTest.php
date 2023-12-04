<?php

namespace Tests\Feature\Http\Controllers\Backend;

use App\Http\Controllers\Backend\AdminController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_login(): void
    {
        $response = $this->get(action([AdminController::class, 'login']));

        $response->assertStatus(200);

        $response->assertViewIs('admin.login');
    }

    public function test_loguear_ok(): void {

        // Preparación del test
        User::factory()->create([
            'email' => 'alfredo@mail.com',
            'password' => Hash::make('123456'),
        ]);

        // Ejecución del test
        $response = $this->post(action([AdminController::class, 'loguear']), [
            'email' => 'alfredo@mail.com',
            'password' => '123456',
        ]);

        // Assertions
        $response->assertRedirect(action([AdminController::class, 'home']));

        $this->assertAuthenticated();
    }

    public function test_loguear_fail(): void {

        // Preparación del test
        User::factory()->create([
            'email' => 'alfredo2@mail.com',
            'password' => Hash::make('123456'),
        ]);

        // Ejecución del test
        $response = $this->post(action([AdminController::class, 'loguear']), [
            'email' => 'alfredo@mail.com',
            'password' => '123456',
        ]);

        // Assertions
        $response->assertRedirect(action([AdminController::class, 'login']))
            ->assertSessionHasErrors();
    }
}
