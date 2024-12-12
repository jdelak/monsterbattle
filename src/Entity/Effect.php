<?php

namespace App\Entity;

use App\Repository\EffectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EffectRepository::class)]
class Effect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, MoveEffect>
     */
    #[ORM\OneToMany(targetEntity: MoveEffect::class, mappedBy: 'id_effect')]
    private Collection $moveEffects;

    public function __construct()
    {
        $this->moveEffects = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, MoveEffect>
     */
    public function getMoveEffects(): Collection
    {
        return $this->moveEffects;
    }

    public function addMoveEffect(MoveEffect $moveEffect): static
    {
        if (!$this->moveEffects->contains($moveEffect)) {
            $this->moveEffects->add($moveEffect);
            $moveEffect->setIdEffect($this);
        }

        return $this;
    }

    public function removeMoveEffect(MoveEffect $moveEffect): static
    {
        if ($this->moveEffects->removeElement($moveEffect)) {
            // set the owning side to null (unless already changed)
            if ($moveEffect->getIdEffect() === $this) {
                $moveEffect->setIdEffect(null);
            }
        }

        return $this;
    }
}
