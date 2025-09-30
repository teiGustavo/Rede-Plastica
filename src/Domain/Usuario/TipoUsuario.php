<?php

declare(strict_types=1);

namespace App\Domain\Usuario;

enum TipoUsuario: string
{
    case VISITANTE = 'visitante';
    case COMPRADOR = 'comprador';
    case COLETOR = 'coletor';
}
