<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'metodo_de_envio',
        'direccion',
        'codigo_postal',
        'localidad',
        'provincia',
        'pais',
    ];
}
