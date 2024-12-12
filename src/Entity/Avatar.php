<?php

namespace App\Entity;

use App\Repository\AvatarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvatarRepository::class)]
class Avatar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $is_playable = null;

    #[ORM\Column(length: 255)]
    private ?string $profile_sprite = null;

    #[ORM\Column(length: 255)]
    private ?string $discuss_sprite = null;

    #[ORM\Column(length: 255)]
    private ?string $idle_sprite = null;

    #[ORM\Column(length: 255)]
    private ?string $moving_sprite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $back_sprite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $front_sprite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPlayable(): ?bool
    {
        return $this->is_playable;
    }

    public function setPlayable(bool $is_playable): static
    {
        $this->is_playable = $is_playable;

        return $this;
    }

    public function getProfileSprite(): ?string
    {
        return $this->profile_sprite;
    }

    public function setProfileSprite(string $profile_sprite): static
    {
        $this->profile_sprite = $profile_sprite;

        return $this;
    }

    public function getDiscussSprite(): ?string
    {
        return $this->discuss_sprite;
    }

    public function setDiscussSprite(string $discuss_sprite): static
    {
        $this->discuss_sprite = $discuss_sprite;

        return $this;
    }

    public function getIdleSprite(): ?string
    {
        return $this->idle_sprite;
    }

    public function setIdleSprite(string $idle_sprite): static
    {
        $this->idle_sprite = $idle_sprite;

        return $this;
    }

    public function getMovingSprite(): ?string
    {
        return $this->moving_sprite;
    }

    public function setMovingSprite(string $moving_sprite): static
    {
        $this->moving_sprite = $moving_sprite;

        return $this;
    }

    public function getBackSprite(): ?string
    {
        return $this->back_sprite;
    }

    public function setBackSprite(?string $back_sprite): static
    {
        $this->back_sprite = $back_sprite;

        return $this;
    }

    public function getFrontSprite(): ?string
    {
        return $this->front_sprite;
    }

    public function setFrontSprite(?string $front_sprite): static
    {
        $this->front_sprite = $front_sprite;

        return $this;
    }
}
