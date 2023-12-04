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

    public static function dataProviderTestLoguear() {
        return [
            'Login ok' => [
                'alfredo@mail.com',
                '123456',
                function() {
                    return action([AdminController::class, 'home']);
                },
                true,
            ],
            'Login fail' => [
                'alfredo@mail.com',
                '1234567',
                function() {
                    return action([AdminController::class, 'login']);
                },
                false,
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestLoguear
     *
     * @param string $email
     * @param string $password
     * @param $urlRedirect
     * @param bool $authenticated
     *
     * @return void
     */
    public function test_loguear(string $email, string $password, $urlRedirect, bool $authenticated): void {

        // Preparación del test
        User::factory()->create([
            'email' => 'alfredo@mail.com',
            'password' => Hash::make('123456'),
        ]);

        // Ejecución del test
        $response = $this->post(action([AdminController::class, 'loguear']), [
            'email' => $email,
            'password' => $password,
        ]);

        // Assertions
        $response->assertRedirect($urlRedirect());

        if($authenticated) {
            $this->assertAuthenticated();
        }
    }
}
