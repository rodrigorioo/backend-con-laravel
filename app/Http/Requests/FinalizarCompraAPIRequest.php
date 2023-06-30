<?php

namespace App\Http\Requests;

use App\Data\ProductoCarritoData;
use App\Enums\MetodoDeEnvio;
use App\Rules\ValidarStockProductoRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FinalizarCompraAPIRequest extends FormRequest
{
    public array $productosCarrito;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'productos' => 'required|array',
            'productos.*.id' => 'required|integer|exists:productos,id',
            'productos.*.cantidad' => ['required', 'integer', new ValidarStockProductoRule()],

            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',

            'metodo_de_envio' => ['required', Rule::in(MetodoDeEnvio::getValues())],
            'direccion' => 'required_if:metodo_de_envio,'.MetodoDeEnvio::ENVIO_A_DOMICILIO.'|nullable|string',
            'codigo_postal' => 'required_if:metodo_de_envio,'.MetodoDeEnvio::ENVIO_A_DOMICILIO.'|nullable|string',
            'localidad' => 'required_if:metodo_de_envio,'.MetodoDeEnvio::ENVIO_A_DOMICILIO.'|nullable|string',
            'provincia' => 'required_if:metodo_de_envio,'.MetodoDeEnvio::ENVIO_A_DOMICILIO.'|nullable|string',
            'pais' => 'required_if:metodo_de_envio,'.MetodoDeEnvio::ENVIO_A_DOMICILIO.'|nullable|string',
        ];
    }

    public function passedValidation()
    {
        foreach($this->productos as $producto) {
            $this->productosCarrito[] = ProductoCarritoData::from([
                'id' => $producto['id'],
                'cantidad' => $producto['cantidad'],
            ]);
        }
    }
}
