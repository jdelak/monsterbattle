<?php

namespace App\Entity;

use App\Repository\MoveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoveRepository::class)]
class Move
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $attacktype = null;

    #[ORM\Column]
    private ?int $power = null;

    #[ORM\Column]
    private ?int $accuracy = null;

    #[ORM\Column]
    private ?int $base_pp = null;

    /**
     * @var Collection<int, MoveEffect>
     */
    #[ORM\OneToMany(targetEntity: MoveEffect::class, mappedBy: 'id_move')]
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

    public function getAttacktype(): ?string
    {
        return $this->attacktype;
    }

    public function setAttacktype(string $attacktype): static
    {
        $this->attacktype = $attacktype;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    public function setAccuracy(int $accuracy): static
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    public function getBasePp(): ?int
    {
        return $this->base_pp;
    }

    public function setBasePp(int $base_pp): static
    {
        $this->base_pp = $base_pp;

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
            $moveEffect->setIdMove($this);
        }

        return $this;
    }

    public function removeMoveEffect(MoveEffect $moveEffect): static
    {
        if ($this->moveEffects->removeElement($moveEffect)) {
            // set the owning side to null (unless already changed)
            if ($moveEffect->getIdMove() === $this) {
                $moveEffect->setIdMove(null);
            }
        }

        return $this;
    }
}
