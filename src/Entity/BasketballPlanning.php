<?php

namespace App\Entity;

use App\Repository\BasketballPlanningRepository;
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
     * @ORM\ManyToOne(targetEntity=BasketballCategory::class, inversedBy="basketballPlanning")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?BasketballCategory $basketballCategory;

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

    public function getBasketballCategory(): ?BasketballCategory
    {
        return $this->basketballCategory;
    }

    public function setBasketballCategory(?BasketballCategory $basketballCategory): self
    {
        $this->basketballCategory = $basketballCategory;

        return $this;
    }
}
