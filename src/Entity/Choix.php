<?php

namespace App\Entity;

use App\Repository\ChoixRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChoixRepository::class)]
class Choix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $libelle = null;

    #[ORM\ManyToOne(inversedBy: 'choix')]
    private ?Evenement $evenement = null;

    #[ORM\ManyToOne(inversedBy: 'choix')]
    private ?influe $influe = null;

    #[ORM\ManyToOne(inversedBy: 'LesChoix')]
    private ?Explication $explication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(?Evenement $evenement): static
    {
        $this->evenement = $evenement;

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

    public function getExplication(): ?Explication
    {
        return $this->explication;
    }

    public function setExplication(?Explication $explication): static
    {
        $this->explication = $explication;

        return $this;
    }
}
