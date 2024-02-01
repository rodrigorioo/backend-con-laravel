<?php

namespace App\Services;

use App\Http\Requests\FinalizarCompraAPIRequest;
use App\Models\Cliente;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class ClienteService {

    /**
     * @param FinalizarCompraAPIRequest $request
     *
     * @return Cliente
     */
    public function crearCliente(FinalizarCompraAPIRequest $request): Cliente
    {
        // Crear cliente
        $data = Arr::only($request->validated(), [
            'nombre', 'apellido', 'email', 'telefono'
        ]);

        $cliente = Cliente::firstOrCreate($data);
        $cliente->password = Hash::make('123');
        $cliente->save();


        return $cliente;
    }
}
