<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Pessoa\Embeddables;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Endereco
{
    #[ORM\Column(length: 150)]
    public string $rua {
        get {
            return $this->rua;
        }
        set {
            $this->rua = $value;
        }
    }

    #[ORM\Column(length: 20)]
    public string $numero {
        get {
            return $this->numero;
        }
        set {
            $this->numero = $value;
        }
    }

    #[ORM\Column(length: 100)]
    public string $bairro {
        get {
            return $this->bairro;
        }
        set {
            $this->bairro = $value;
        }
    }

    #[ORM\Column(length: 8)]
    public string $cep {
        get {
            return $this->cep;
        }
        set {
            $this->cep = $value;
        }
    }
}