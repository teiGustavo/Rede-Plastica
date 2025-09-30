<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Pessoa;

use App\Domain\Pessoa\Pessoa\TipoPessoa;
use App\Infrastructure\Persistence\Entities\Pessoa\Embeddables\Endereco;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "pessoa")]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'tipo', type: 'string', length: 20)]
#[ORM\DiscriminatorMap([
    TipoPessoa::FISICA->value => PessoaFisicaEntity::class,
    TipoPessoa::JURIDICA->value => PessoaJuridicaEntity::class
])]
abstract class PessoaEntity
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

    #[ORM\Embedded(class: Endereco::class, columnPrefix: false)]
    public Endereco $endereco;

    #[ORM\Column(name: 'ponto_geografico', type: "point", nullable: true)]
    public ?array $pontoGeografico {
        get {
            return $this->pontoGeografico;
        }
        set {
            $this->pontoGeografico = $value;
        }
    }

    #[ORM\OneToOne(targetEntity: PessoaEntity::class)]
    #[ORM\JoinColumn(name: "pessoa_id", referencedColumnName: "id", nullable: false)]
    public PessoaEntity $pessoa;

    public function __construct()
    {
        $this->endereco = new Endereco();
    }

    protected function setFieldsFromChild(PessoaEntity $existing): self
    {
        $this->id = $existing->id;
        $this->endereco = $existing->endereco;
        $this->pontoGeografico = $existing->pontoGeografico;

        return $this;
    }
}