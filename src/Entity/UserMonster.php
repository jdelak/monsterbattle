<?php

namespace App\Entity;

use App\Repository\UserMonsterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserMonsterRepository::class)]
class UserMonster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userMonsters')]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'userMonsters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Monster $monster_id = null;

    #[ORM\Column]
    private ?int $related_to = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?int $max_hp = null;

    #[ORM\Column]
    private ?int $max_attack = null;

    #[ORM\Column]
    private ?int $max_defense = null;

    #[ORM\Column]
    private ?int $max_special_attack = null;

    #[ORM\Column]
    private ?int $max_special_defense = null;

    #[ORM\Column]
    private ?int $max_speed = null;

    #[ORM\Column]
    private ?int $current_hp = null;

    #[ORM\Column]
    private ?float $bonus_hp_level = null;

    #[ORM\Column]
    private ?int $bonus_attack_level = null;

    #[ORM\Column]
    private ?float $bonus_defense_level = null;

    #[ORM\Column]
    private ?float $bonus_special_attack_level = null;

    #[ORM\Column]
    private ?float $bonus_special_defense_level = null;

    #[ORM\Column]
    private ?float $bonus_speed_level = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?bool $in_party = null;

    #[ORM\Column]
    private ?int $position = null;

    #[ORM\Column]
    private array $learned_moves = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
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

    public function getRelatedTo(): ?int
    {
        return $this->related_to;
    }

    public function setRelatedTo(int $related_to): static
    {
        $this->related_to = $related_to;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getMaxHp(): ?int
    {
        return $this->max_hp;
    }

    public function setMaxHp(int $max_hp): static
    {
        $this->max_hp = $max_hp;

        return $this;
    }

    public function getMaxAttack(): ?int
    {
        return $this->max_attack;
    }

    public function setMaxAttack(int $max_attack): static
    {
        $this->max_attack = $max_attack;

        return $this;
    }

    public function getMaxDefense(): ?int
    {
        return $this->max_defense;
    }

    public function setMaxDefense(int $max_defense): static
    {
        $this->max_defense = $max_defense;

        return $this;
    }

    public function getMaxSpecialAttack(): ?int
    {
        return $this->max_special_attack;
    }

    public function setMaxSpecialAttack(int $max_special_attack): static
    {
        $this->max_special_attack = $max_special_attack;

        return $this;
    }

    public function getMaxSpecialDefense(): ?int
    {
        return $this->max_special_defense;
    }

    public function setMaxSpecialDefense(int $max_special_defense): static
    {
        $this->max_special_defense = $max_special_defense;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->max_speed;
    }

    public function setMaxSpeed(int $max_speed): static
    {
        $this->max_speed = $max_speed;

        return $this;
    }

    public function getCurrentHp(): ?int
    {
        return $this->current_hp;
    }

    public function setCurrentHp(int $current_hp): static
    {
        $this->current_hp = $current_hp;

        return $this;
    }

    public function getBonusHpLevel(): ?float
    {
        return $this->bonus_hp_level;
    }

    public function setBonusHpLevel(float $bonus_hp_level): static
    {
        $this->bonus_hp_level = $bonus_hp_level;

        return $this;
    }

    public function getBonusAttackLevel(): ?int
    {
        return $this->bonus_attack_level;
    }

    public function setBonusAttackLevel(int $bonus_attack_level): static
    {
        $this->bonus_attack_level = $bonus_attack_level;

        return $this;
    }

    public function getBonusDefenseLevel(): ?float
    {
        return $this->bonus_defense_level;
    }

    public function setBonusDefenseLevel(float $bonus_defense_level): static
    {
        $this->bonus_defense_level = $bonus_defense_level;

        return $this;
    }

    public function getBonusSpecialAttackLevel(): ?float
    {
        return $this->bonus_special_attack_level;
    }

    public function setBonusSpecialAttackLevel(float $bonus_special_attack_level): static
    {
        $this->bonus_special_attack_level = $bonus_special_attack_level;

        return $this;
    }

    public function getBonusSpecialDefenseLevel(): ?float
    {
        return $this->bonus_special_defense_level;
    }

    public function setBonusSpecialDefenseLevel(float $bonus_special_defense_level): static
    {
        $this->bonus_special_defense_level = $bonus_special_defense_level;

        return $this;
    }

    public function getBonusSpeedLevel(): ?float
    {
        return $this->bonus_speed_level;
    }

    public function setBonusSpeedLevel(float $bonus_speed_level): static
    {
        $this->bonus_speed_level = $bonus_speed_level;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): static
    {
        $this->experience = $experience;

        return $this;
    }

    public function isInParty(): ?bool
    {
        return $this->in_party;
    }

    public function setInParty(bool $in_party): static
    {
        $this->in_party = $in_party;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function getLearnedMoves(): array
    {
        return $this->learned_moves;
    }

    public function setLearnedMoves(array $learned_moves): static
    {
        $this->learned_moves = $learned_moves;

        return $this;
    }
}
