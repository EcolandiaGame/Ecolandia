<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatistiqueRepository::class)]
class Statistique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $points = null;

    #[ORM\ManyToOne(inversedBy: 'statistiques')]
    private ?NomStatistique $Se_nomme = null;

    #[ORM\ManyToOne(inversedBy: 'statistiques')]
    private ?Partie $partie = null;

    #[ORM\ManyToOne(inversedBy: 'statistiques')]
    private ?influe $influe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getSeNomme(): ?NomStatistique
    {
        return $this->Se_nomme;
    }

    public function setSeNomme(?NomStatistique $Se_nomme): static
    {
        $this->Se_nomme = $Se_nomme;

        return $this;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(?Partie $partie): static
    {
        $this->partie = $partie;

        return $this;
    }

    public function getInflue(): ?influe
    {
        return $this->influe;
    }

    public function setInflue(?influe $influe): static
    {
        $this->influe = $influe;

        return $this;
    }
}
