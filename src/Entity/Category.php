<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=AdherantPartenaire::class, mappedBy="category")
     * @var Collection
     */
    private Collection $adherantPartenaires;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function __construct()
    {
        $this->adherantPartenaires = new ArrayCollection();
    }

    /**
     * @return Collection|AdherantPartenaire[]
     */
    public function getAdherantPartenaire(): Collection
    {
        return $this->adherantPartenaires;
    }

    public function addAdherantPartenaire(AdherantPartenaire $adherantPartenaires): self
    {
        if (! $this->adherantPartenaires->contains($adherantPartenaires)) {
            $this->adherantPartenaires[] = $adherantPartenaires;
            $adherantPartenaires->setCategory($this);
        }
        return $this;
    }

    public function removeAdherantPartenaire(AdherantPartenaire $adherantPartenaires): self
    {
        if ($this->adherantPartenaires->removeElement($adherantPartenaires)) {
            // set the owning side to null (unless already changed)
            if ($adherantPartenaires->getCategory() === $this) {
                $adherantPartenaires->setCategory(null);
            }
        }
        return $this;
    }
}
