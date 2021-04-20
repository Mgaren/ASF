<?php

namespace App\Entity;

use App\Repository\PartenaireCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartenaireCategoryRepository::class)
 */
class PartenaireCategory
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
     * @ORM\OneToMany(targetEntity=AdherantPartenaire::class, mappedBy="partenaireCategory")
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
            $adherantPartenaires->setPartenaireCategory($this);
        }
        return $this;
    }

    public function removeAdherantPartenaire(AdherantPartenaire $adherantPartenaires): self
    {
        if ($this->adherantPartenaires->removeElement($adherantPartenaires)) {
            // set the owning side to null (unless already changed)
            if ($adherantPartenaires->getPartenaireCategory() === $this) {
                $adherantPartenaires->setPartenaireCategory(null);
            }
        }
        return $this;
    }
}
