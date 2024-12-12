<?php

namespace App\Entity;

use App\Repository\MoveEffectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoveEffectRepository::class)]
class MoveEffect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'moveEffects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Move $id_move = null;

    #[ORM\ManyToOne(inversedBy: 'moveEffects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Effect $id_effect = null;

    // 0 => self, 1 => ennemy
    #[ORM\Column]
    private ?bool $target = null;

    #[ORM\Column(nullable: true)]
    private ?int $amount = null;

    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMove(): ?Move
    {
        return $this->id_move;
    }

    public function setIdMove(?Move $id_move): static
    {
        $this->id_move = $id_move;

        return $this;
    }

    public function getIdEffect(): ?Effect
    {
        return $this->id_effect;
    }

    public function setIdEffect(?Effect $id_effect): static
    {
        $this->id_effect = $id_effect;

        return $this;
    }

    public function isTarget(): ?bool
    {
        return $this->target;
    }

    public function setTarget(bool $target): static
    {
        $this->target = $target;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }
}
