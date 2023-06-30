<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;
final class MetodoDeEnvio extends Enum
{
    const ENVIO_A_DOMICILIO = 'Envío a domicilio';
    const RETIRO_EN_SUCURSAL = 'Retiro en sucursal';
}
