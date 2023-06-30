<?php

namespace App\Rules;

use App\Models\Producto;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidarStockProductoRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Obtenemos el índice del objeto del array y buscamos el ID del producto
        $indice = explode('.', $attribute)[1];
        $idProducto = request()->input('productos.'.$indice.'.id');

        // Buscamos el producto
        $producto = Producto::find($idProducto);

        // La cantidad sea menor al stock del producto que estamos validando
        if($producto->stock < $value) {
            $fail('La cantidad del producto '.$producto->nombre.' ingresada no es válida');
        }
    }
}
