<?php

namespace App\Entity;

use App\Repository\ActualityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActualityRepository::class)
 */
class Actuality
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
    private string $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $description10;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): void
    {
        $this->description2 = $description2;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): void
    {
        $this->description3 = $description3;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(?string $description4): void
    {
        $this->description4 = $description4;
    }

    public function getDescription5(): ?string
    {
        return $this->description5;
    }

    public function setDescription5(?string $description5): void
    {
        $this->description5 = $description5;
    }

    public function getDescription6(): ?string
    {
        return $this->description6;
    }

    public function setDescription6(?string $description6): void
    {
        $this->description6 = $description6;
    }

    public function getDescription7(): ?string
    {
        return $this->description7;
    }

    public function setDescription7(?string $description7): void
    {
        $this->description7 = $description7;
    }

    public function getDescription8(): ?string
    {
        return $this->description8;
    }

    public function setDescription8(?string $description8): void
    {
        $this->description8 = $description8;
    }

    public function getDescription9(): ?string
    {
        return $this->description9;
    }

    public function setDescription9(?string $description9): void
    {
        $this->description9 = $description9;
    }

    public function getDescription10(): ?string
    {
        return $this->description10;
    }

    public function setDescription10(?string $description10): void
    {
        $this->description10 = $description10;
    }
}
