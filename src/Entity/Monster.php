<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type2 = null;

    #[ORM\Column]
    private ?int $base_hp = null;

    #[ORM\Column]
    private ?int $base_attack = null;

    #[ORM\Column]
    private ?int $base_defense = null;

    #[ORM\Column]
    private ?int $base_special_attack = null;

    #[ORM\Column]
    private ?int $base_special_defense = null;

    #[ORM\Column]
    private ?int $base_speed = null;

    #[ORM\Column(length: 255)]
    private ?string $sprite_front = null;

    #[ORM\Column(length: 255)]
    private ?string $sprite_back = null;

    #[ORM\Column]
    private ?bool $can_evolve = null;

    #[ORM\Column(nullable: true)]
    private ?int $evolve_to = null;

    #[ORM\Column(nullable: true)]
    private ?int $evolution_level = null;

    /**
     * @var Collection<int, MonsterMove>
     */
    #[ORM\OneToMany(targetEntity: MonsterMove::class, mappedBy: 'monster_id')]
    private Collection $monsterMoves;

    public function __construct()
    {
        $this->monsterMoves = new ArrayCollection();
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

    public function getType1(): ?string
    {
        return $this->type1;
    }

    public function setType1(string $type1): static
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?string
    {
        return $this->type2;
    }

    public function setType2(?string $type2): static
    {
        $this->type2 = $type2;

        return $this;
    }

    public function getBaseHp(): ?int
    {
        return $this->base_hp;
    }

    public function setBaseHp(int $base_hp): static
    {
        $this->base_hp = $base_hp;

        return $this;
    }

    public function getBaseAttack(): ?int
    {
        return $this->base_attack;
    }

    public function setBaseAttack(int $base_attack): static
    {
        $this->base_attack = $base_attack;

        return $this;
    }

    public function getBaseDefense(): ?int
    {
        return $this->base_defense;
    }

    public function setBaseDefense(int $base_defense): static
    {
        $this->base_defense = $base_defense;

        return $this;
    }

    public function getBaseSpecialAttack(): ?int
    {
        return $this->base_special_attack;
    }

    public function setBaseSpecialAttack(int $base_special_attack): static
    {
        $this->base_special_attack = $base_special_attack;

        return $this;
    }

    public function getBaseSpecialDefense(): ?int
    {
        return $this->base_special_defense;
    }

    public function setBaseSpecialDefense(int $base_special_defense): static
    {
        $this->base_special_defense = $base_special_defense;

        return $this;
    }

    public function getBaseSpeed(): ?int
    {
        return $this->base_speed;
    }

    public function setBaseSpeed(int $base_speed): static
    {
        $this->base_speed = $base_speed;

        return $this;
    }

    public function getSpriteFront(): ?string
    {
        return $this->sprite_front;
    }

    public function setSpriteFront(string $sprite_front): static
    {
        $this->sprite_front = $sprite_front;

        return $this;
    }

    public function getSpriteBack(): ?string
    {
        return $this->sprite_back;
    }

    public function setSpriteBack(string $sprite_back): static
    {
        $this->sprite_back = $sprite_back;

        return $this;
    }

    public function isCanEvolve(): ?bool
    {
        return $this->can_evolve;
    }

    public function setCanEvolve(bool $can_evolve): static
    {
        $this->can_evolve = $can_evolve;

        return $this;
    }

    public function getEvolveTo(): ?int
    {
        return $this->evolve_to;
    }

    public function setEvolveTo(?int $evolve_to): static
    {
        $this->evolve_to = $evolve_to;

        return $this;
    }

    public function getEvolutionLevel(): ?int
    {
        return $this->evolution_level;
    }

    public function setEvolutionLevel(?int $evolution_level): static
    {
        $this->evolution_level = $evolution_level;

        return $this;
    }

    /**
     * @return Collection<int, MonsterMove>
     */
    public function getMonsterMoves(): Collection
    {
        return $this->monsterMoves;
    }

    public function addMonsterMove(MonsterMove $monsterMove): static
    {
        if (!$this->monsterMoves->contains($monsterMove)) {
            $this->monsterMoves->add($monsterMove);
            $monsterMove->setMonsterId($this);
        }

        return $this;
    }

    public function removeMonsterMove(MonsterMove $monsterMove): static
    {
        if ($this->monsterMoves->removeElement($monsterMove)) {
            // set the owning side to null (unless already changed)
            if ($monsterMove->getMonsterId() === $this) {
                $monsterMove->setMonsterId(null);
            }
        }

        return $this;
    }
}
