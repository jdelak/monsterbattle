<?php

namespace App\Entity;

use App\Repository\NPCRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NPCRepository::class)]
class NPC
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Avatar $avatar_id = null;

    #[ORM\Column]
    private ?bool $is_trainer = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?array $monster_list = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatarId(): ?Avatar
    {
        return $this->avatar_id;
    }

    public function setAvatarId(?Avatar $avatar_id): static
    {
        $this->avatar_id = $avatar_id;

        return $this;
    }

    public function isTrainer(): ?bool
    {
        return $this->is_trainer;
    }

    public function setTrainer(bool $is_trainer): static
    {
        $this->is_trainer = $is_trainer;

        return $this;
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

    public function getMonsterList(): ?array
    {
        return $this->monster_list;
    }

    public function setMonsterList(?array $monster_list): static
    {
        $this->monster_list = $monster_list;

        return $this;
    }
}
