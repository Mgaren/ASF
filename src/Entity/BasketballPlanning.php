<?php

namespace App\Entity;

use App\Repository\BasketballPlanningRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketballPlanningRepository::class)
 */
class BasketballPlanning
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
    private string $day;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $cotisation;

    /**
     * @ORM\ManyToMany(targetEntity=BasketballCategory::class, inversedBy="basketballPlanning")
     * @var Collection
     */
    private Collection $basketballCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCotisation(): ?string
    {
        return $this->cotisation;
    }

    public function setCotisation(string $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    public function __construct()
    {
        $this->basketballCategory = new ArrayCollection();
    }

    /**
     * @return Collection|BasketballCategory[]
     */
    public function getBasketballCategory(): Collection
    {
        return $this->basketballCategory;
    }

    public function addBasketballCategory(BasketballCategory $basketballCategory): self
    {
        if (! $this->basketballCategory->contains($basketballCategory)) {
            $this->basketballCategory[] = $basketballCategory;
            $basketballCategory->addBasketballPlanning($this);
        }
        return $this;
    }

    public function removeBasketballCategory(BasketballCategory $basketballCategory): self
    {
        if ($this->basketballCategory->contains($basketballCategory)) {
            $this->basketballCategory->removeElement($basketballCategory);
            $basketballCategory->removeBasketballPlanning($this);
        }
        return $this;
    }
}
