<?php

namespace App\Entity;

use App\Repository\ExplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExplicationRepository::class)]
class Explication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $source = null;

    #[ORM\OneToMany(mappedBy: 'explication', targetEntity: Choix::class)]
    private Collection $LesChoix;

    public function __construct()
    {
        $this->LesChoix = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return Collection<int, Choix>
     */
    public function getLesChoix(): Collection
    {
        return $this->LesChoix;
    }

    public function addLesChoix(Choix $lesChoix): static
    {
        if (!$this->LesChoix->contains($lesChoix)) {
            $this->LesChoix->add($lesChoix);
            $lesChoix->setExplication($this);
        }

        return $this;
    }

    public function removeLesChoix(Choix $lesChoix): static
    {
        if ($this->LesChoix->removeElement($lesChoix)) {
            // set the owning side to null (unless already changed)
            if ($lesChoix->getExplication() === $this) {
                $lesChoix->setExplication(null);
            }
        }

        return $this;
    }
}
