<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Pessoa;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "pessoa_juridica")]
class PessoaJuridicaEntity extends PessoaEntity
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

    #[ORM\Column(length: 200)]
    public string $razaoSocial {
        get  {
            return $this->razaoSocial;
        }
        set {
            $this->razaoSocial = $value;
        }
    }

    #[ORM\Column(length: 150)]
    public string $nomeFantasia {
        get  {
            return $this->nomeFantasia;
        }
        set {
            $this->nomeFantasia = $value;
        }
    }

    #[ORM\Column(length: 14, unique: true)]
    public string $cnpj {
        get {
            return $this->cnpj;
        }
        set {
            $this->cnpj = $value;
        }
    }

    public function fromExisting(PessoaJuridicaEntity $existing): self
    {
        $this->id = $existing->id;
        $this->razaoSocial = $existing->razaoSocial;
        $this->nomeFantasia = $existing->nomeFantasia;
        $this->cnpj = $existing->cnpj;

        parent::setFieldsFromChild($existing);

        return $this;
    }
}