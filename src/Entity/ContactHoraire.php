<?php

namespace App\Entity;

use App\Repository\ContactHoraireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactHoraireRepository::class)
 */
class ContactHoraire
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
    private string $morningHours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $afternoonHours;

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

    public function getMorningHours(): ?string
    {
        return $this->morningHours;
    }

    public function setMorningHours(string $morningHours): self
    {
        $this->morningHours = $morningHours;

        return $this;
    }

    public function getAfternoonHours(): ?string
    {
        return $this->afternoonHours;
    }

    public function setAfternoonHours(string $afternoonHours): self
    {
        $this->afternoonHours = $afternoonHours;

        return $this;
    }
}
