<?php

namespace App\Entity;

use App\Repository\DirigeantsPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DirigeantsPostRepository::class)
 */
class DirigeantsPost
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
    private string $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity=Dirigeants::class, mappedBy="dirigeantsPost")
     * @var Collection
     */
    private Collection $dirigeants;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
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
        $this->dirigeants = new ArrayCollection();
    }

    /**
     * @return Collection|Dirigeants[]
     */
    public function getDirigeants(): Collection
    {
        return $this->dirigeants;
    }

    public function addDirigeant(Dirigeants $dirigeants): self
    {
        if (! $this->dirigeants->contains($dirigeants)) {
            $this->dirigeants[] = $dirigeants;
            $dirigeants->setDirigeantsPost($this);
        }
        return $this;
    }

    public function removeDirigeant(Dirigeants $dirigeants): self
    {
        if ($this->dirigeants->removeElement($dirigeants)) {
            // set the owning side to null (unless already changed)
            if ($dirigeants->getDirigeantsPost() === $this) {
                $dirigeants->setDirigeantsPost(null);
            }
        }
        return $this;
    }
}
