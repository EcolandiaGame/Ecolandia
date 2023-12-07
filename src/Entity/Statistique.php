<?php

namespace App\Entity;

use App\Repository\StatistiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'statistique', targetEntity: Influe::class)]
    private Collection $influent;

    public function __construct()
    {
        $this->influent = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Influe>
     */
    public function getInfluent(): Collection
    {
        return $this->influent;
    }

    public function addInfluent(Influe $influent): static
    {
        if (!$this->influent->contains($influent)) {
            $this->influent->add($influent);
            $influent->setStatistique($this);
        }

        return $this;
    }

    public function removeInfluent(Influe $influent): static
    {
        if ($this->influent->removeElement($influent)) {
            // set the owning side to null (unless already changed)
            if ($influent->getStatistique() === $this) {
                $influent->setStatistique(null);
            }
        }

        return $this;
    }

}
