<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "contato")]
class ContatoEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
     public ?int $id {
        get {
            return $this->id;
        }
        set {
            $this->id = $value;
        }
    }

    #[ORM\Column(length: 150)]
    public string $email {
        get {
            return $this->email;
        }
        set {
            $this->email = $value;
        }
    }

    #[ORM\Column(length: 20)]
    public string $telefone {
        get {
            return $this->telefone;
        }
        set {
            $this->telefone = $value;
        }
    }

    #[ORM\Column(length: 20)]
    public string $whatsapp {
        get {
            return $this->whatsapp;
        }
        set {
            $this->whatsapp = $value;
        }
    }

}