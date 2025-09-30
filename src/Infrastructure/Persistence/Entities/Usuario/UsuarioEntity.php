<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Usuario;

use App\Domain\Usuario\TipoUsuario;
use App\Infrastructure\Persistence\Entities\ContatoEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "usuario")]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'tipo', type: 'string', length: 20)]
#[ORM\DiscriminatorMap([
    TipoUsuario::VISITANTE->value => VisitanteEntity::class,
    TipoUsuario::COMPRADOR->value  => CompradorEntity::class,
    TipoUsuario::COLETOR->value  => ColetorEntity::class,
])]
abstract class UsuarioEntity
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

    #[ORM\Column(length: 50, unique: true)]
    public string $login {
        get {
            return $this->login;
        }
        set {
            $this->login = $value;
        }
    }

    #[ORM\Column(length: 255)]
    public string $senha {
        get {
            return $this->senha;
        }
        set {
            $this->senha = $value;
        }
    }

    /**
     * Muitos para muitos - Usuários e Contatos
     * @var Collection<int, ContatoEntity>
     */
    #[ORM\JoinTable(name: 'usuario_contato')]
    #[ORM\JoinColumn(name: 'usuario_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'contato_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: ContatoEntity::class)]
    public Collection $contatos {
        get {
            return $this->contatos;
        }
        set {
            $this->contatos = $value;
        }
    }

    public function __construct()
    {
        $this->contatos = new ArrayCollection();
    }

    protected function setFieldsFromChild(UsuarioEntity $existing): self
    {
        $this->id = $existing->id;
        $this->login = $existing->login;
        $this->senha = $existing->senha;
        $this->contatos = $existing->contatos;

        return $this;
    }
}