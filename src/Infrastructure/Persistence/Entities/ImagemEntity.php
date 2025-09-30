<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "imagem")]
class ImagemEntity
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

    #[ORM\Column(type: Types::TEXT)]
    public string $url {
        get {
            return $this->url;
        }
        set {
            $this->url = $value;
        }
    }

}