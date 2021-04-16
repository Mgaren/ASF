<?php

namespace App\Entity;

use App\Repository\BasketballCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketballCategoryRepository::class)
 */
class BasketballCategory
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
     * @ORM\OneToMany(targetEntity=BasketballPlanning::class, mappedBy="basketballCategory")
     * @var Collection
     */
    private Collection $basketballPlanning;

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
        $this->basketballPlanning = new ArrayCollection();
    }

    /**
     * @return Collection|BasketballPlanning[]
     */
    public function getBasketballPlanning(): Collection
    {
        return $this->basketballPlanning;
    }

    public function addBasketballPlanning(BasketballPlanning $basketballPlanning): self
    {
        if (! $this->basketballPlanning->contains($basketballPlanning)) {
            $this->basketballPlanning[] = $basketballPlanning;
            $basketballPlanning->setBasketballCategory($this);
        }
        return $this;
    }

    public function removeBasketballPlanning(BasketballPlanning $basketballPlanning): self
    {
        if ($this->basketballPlanning->removeElement($basketballPlanning)) {
            if ($basketballPlanning->getBasketballCategory() === $this) {
                $basketballPlanning->setBasketballCategory(null);
            }
        }
        return $this;
    }
}
