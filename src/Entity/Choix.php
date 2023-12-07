<?php

namespace App\Entity;

use App\Repository\ChoixRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'LesChoix')]
    private ?Explication $explication = null;

    #[ORM\OneToMany(mappedBy: 'choix', targetEntity: Influe::class)]
    private Collection $influent;

    public function __construct()
    {
        $this->influent = new ArrayCollection();
    }

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

    public function getExplication(): ?Explication
    {
        return $this->explication;
    }

    public function setExplication(?Explication $explication): static
    {
        $this->explication = $explication;

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
            $influent->setChoix($this);
        }

        return $this;
    }

    public function removeInfluent(Influe $influent): static
    {
        if ($this->influent->removeElement($influent)) {
            // set the owning side to null (unless already changed)
            if ($influent->getChoix() === $this) {
                $influent->setChoix(null);
            }
        }

        return $this;
    }
}
