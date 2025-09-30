<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Pessoa;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "pessoa_fisica")]
class PessoaFisicaEntity extends PessoaEntity
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
    public string $nome {
        get {
            return $this->nome;
        }
        set {
            $this->nome = $value;
        }
    }

    #[ORM\Column(length: 11, unique: true)]
    public string $cpf {
        get {
            return $this->cpf;
        }
        set {
            $this->cpf = $value;
        }
    }

    #[ORM\Column(name: 'data_nascimento',type: Types::DATE_IMMUTABLE)]
    public DateTimeInterface $dataNascimento {
        get {
            return $this->dataNascimento;
        }
        set {
            $this->dataNascimento = $value;
        }
    }

    public function fromExisting(PessoaFisicaEntity $existing): self
    {
        $this->id = $existing->id;
        $this->nome = $existing->nome;
        $this->cpf = $existing->cpf;
        $this->dataNascimento = $existing->dataNascimento;
        
        parent::setFieldsFromChild($existing);
        
        return $this;
    }
}