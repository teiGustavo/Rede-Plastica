<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "rede_social")]
class RedeSocialEntity
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

    #[ORM\Column(length: 50)]
    public string $tipo {
        get {
            return $this->tipo;
        }
        set {
            $this->tipo = $value;
        }
    }

    #[ORM\Column(length: 255)]
    public string $profile {
        get {
            return $this->profile;
        }
        set {
            $this->profile = $value;
        }
    }

}