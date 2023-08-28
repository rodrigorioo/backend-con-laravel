<?php

namespace App\Services;

use App\Exceptions\MercadoPagoException;
use App\Models\Compra;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class MercadoPagoService {

    public function __construct() {
        try {
            SDK::setAccessToken(config('mercadopago.access_token'));
        } catch (\Exception $e) {
            throw new MercadoPagoException();
        }

    }

    public function crearPreferencia(Compra $compra) {

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Creo los items de la preferencia
        $items = [];
        foreach($compra->productos as $productoCompra) {

            $item = new Item();
            $item->title = $productoCompra->nombre;
            $item->quantity = $productoCompra->pivot->cantidad;
            $item->unit_price = $productoCompra->pivot->precio;

            $items[] = $item;
        }

        $preference->items = $items;
        $preference->external_reference = $compra->id;
        $preference->save();

        // Validar errores
        if($preference->error) {
            throw new MercadoPagoException($preference->error->message, $preference->error->status);
        }

        return $preference;
    }

    public function obtenerPago() {
        // Consultar a mercadopago por la preferencia...
    }

}