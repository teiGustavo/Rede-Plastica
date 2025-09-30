<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Entities\Usuario;

use App\Infrastructure\Persistence\Entities\RedeSocialEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class ColetorEntity extends UsuarioEntity
{
    /**
     * Muitos para muitos - Usuários e Redes Sociais
     * @var Collection<int, RedeSocialEntity>
     */
    #[ORM\JoinTable(name: 'usuario_contato')]
    #[ORM\JoinColumn(name: 'usuario_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'rede_social_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: RedeSocialEntity::class)]
    private Collection $redesSociais {
        get {
            return $this->redesSociais;
        }
        set {
            $this->redesSociais = $value;
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->redesSociais = new ArrayCollection();
    }

    public function fromExisting(ColetorEntity $existing): self
    {
        parent::setFieldsFromChild($existing);

        $this->redesSociais = $existing->redesSociais;

        return $this;
    }
}