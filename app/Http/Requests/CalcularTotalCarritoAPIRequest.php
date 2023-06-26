<?php

namespace App\Http\Requests;

use App\Data\ProductoCarritoData;
use Illuminate\Foundation\Http\FormRequest;

class CalcularTotalCarritoAPIRequest extends FormRequest
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
            'productos.*.cantidad' => 'required|integer',
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
