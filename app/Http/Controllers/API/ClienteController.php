<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\IngresarClienteAPIRequest;
use App\Models\Compra;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function ingresar(IngresarClienteAPIRequest $request) {

        if(Auth::guard('api')->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            return new JsonResponse([
                'message' => 'Login exitoso',
            ]);
        }

        return new JsonResponse([
            'message' => 'Email o contraseña inválidos',
        ], Response::HTTP_UNAUTHORIZED);
    }

    public function compras(Request $request) {

        $cliente = $request->user();

        $compras = Compra::where('cliente_id', $cliente->id)
            ->get();

        return new JsonResponse($compras);
    }
}
