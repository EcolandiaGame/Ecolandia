<?php

namespace App\Entity;

use App\Repository\InflueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InflueRepository::class)]
class influe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $change_points = null;

    #[ORM\ManyToOne(inversedBy: 'influent')]
    private ?Statistique $statistique = null;

    #[ORM\ManyToOne(inversedBy: 'influent')]
    private ?Choix $choix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChangePoints(): ?int
    {
        return $this->change_points;
    }

    public function setChangePoints(?int $change_points): static
    {
        $this->change_points = $change_points;

        return $this;
    }

    public function getStatistique(): ?Statistique
    {
        return $this->statistique;
    }

    public function setStatistique(?Statistique $statistique): static
    {
        $this->statistique = $statistique;

        return $this;
    }

    public function getChoix(): ?Choix
    {
        return $this->choix;
    }

    public function setChoix(?Choix $choix): static
    {
        $this->choix = $choix;

        return $this;
    }
}
