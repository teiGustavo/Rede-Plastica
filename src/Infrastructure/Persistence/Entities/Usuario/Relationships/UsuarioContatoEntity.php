<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Usuario\Relationships;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "usuario_contato")]
class UsuarioContatoEntity
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    public ?int $usuarioId {
        get {
         return $this->usuarioId;
        }
        set {
         $this->usuarioId = $value;
        }
    }

    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    public ?int $contatoId {
        get {
            return $this->contatoId;
        }
        set {
            $this->contatoId = $value;
        }
    }
}