<?php

namespace App\Entity;

use App\Repository\MonsterMoveRepository;
use Doctrine\ORM\Mapping as ORM;

//reminder : maybe change it to many to many with extrafields
#[ORM\Entity(repositoryClass: MonsterMoveRepository::class)]
class MonsterMove
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'monsterMoves')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Monster $monster_id = null;

    #[ORM\ManyToOne(inversedBy: 'monsters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Move $move_id = null;

    #[ORM\Column]
    private ?int $required_level = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonsterId(): ?Monster
    {
        return $this->monster_id;
    }

    public function setMonsterId(?Monster $monster_id): static
    {
        $this->monster_id = $monster_id;

        return $this;
    }

    public function getMoveId(): ?Move
    {
        return $this->move_id;
    }

    public function setMoveId(?Move $move_id): static
    {
        $this->move_id = $move_id;

        return $this;
    }

    public function getRequiredLevel(): ?int
    {
        return $this->required_level;
    }

    public function setRequiredLevel(int $required_level): static
    {
        $this->required_level = $required_level;

        return $this;
    }
}
