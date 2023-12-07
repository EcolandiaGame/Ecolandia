<?php

namespace App\Entity;

use App\Repository\InflueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'influe', targetEntity: Choix::class)]
    private Collection $choix;

    #[ORM\OneToMany(mappedBy: 'influe', targetEntity: Statistique::class)]
    private Collection $statistiques;

    public function __construct()
    {
        $this->choix = new ArrayCollection();
        $this->statistiques = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Choix>
     */
    public function getChoix(): Collection
    {
        return $this->choix;
    }

    public function addChoix(Choix $choix): static
    {
        if (!$this->choix->contains($choix)) {
            $this->choix->add($choix);
            $choix->setInflue($this);
        }

        return $this;
    }

    public function removeChoix(Choix $choix): static
    {
        if ($this->choix->removeElement($choix)) {
            // set the owning side to null (unless already changed)
            if ($choix->getInflue() === $this) {
                $choix->setInflue(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Statistique>
     */
    public function getStatistiques(): Collection
    {
        return $this->statistiques;
    }

    public function addStatistique(Statistique $statistique): static
    {
        if (!$this->statistiques->contains($statistique)) {
            $this->statistiques->add($statistique);
            $statistique->setInflue($this);
        }

        return $this;
    }

    public function removeStatistique(Statistique $statistique): static
    {
        if ($this->statistiques->removeElement($statistique)) {
            // set the owning side to null (unless already changed)
            if ($statistique->getInflue() === $this) {
                $statistique->setInflue(null);
            }
        }

        return $this;
    }
}
