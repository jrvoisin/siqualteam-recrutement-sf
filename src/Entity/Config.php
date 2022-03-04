<?php

namespace App\Entity;

use App\Repository\ConfigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConfigRepository::class)
 */
class Config
{
    const MODERATION_LEVEL = [
        0 => "Publier sans modération",
        1 => "Ne publier qu'après modération",
        2 => "Publier automatiquement si l'utilisateur a déjà été approuvé"
    ];

    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", options={"default":0})
     */
    private $moderationLevel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModerationLevel(): ?int
    {
        return $this->moderationLevel;
    }

    public function setModerationLevel(int $moderationLevel): self
    {
        $this->moderationLevel = $moderationLevel;

        return $this;
    }
}
