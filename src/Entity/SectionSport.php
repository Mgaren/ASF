<?php

namespace App\Entity;

use App\Repository\SectionSportRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionSportRepository::class)
 */
class SectionSport
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
    private string $description1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image = '';

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $lien;

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="sectionSport")
     * @ORM\JoinColumn(nullable=false)
     * @var Section|null
     */
    private ?Section $section;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(string $description1): self
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(string $description3): self
    {
        $this->description3 = $description3;

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

    public function getLien(): string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }
}
