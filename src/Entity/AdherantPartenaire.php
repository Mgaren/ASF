<?php

namespace App\Entity;

use App\Repository\AdherantPartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherantPartenaireRepository::class)
 */
class AdherantPartenaire
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
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image = '';

    /**
     * @ORM\ManyToOne(targetEntity=PartenaireCategory::class, inversedBy="adherantPartenaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?PartenaireCategory $partenaireCategory;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

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

    public function getPartenaireCategory(): ?PartenaireCategory
    {
        return $this->partenaireCategory;
    }

    public function setPartenaireCategory(?PartenaireCategory $partenaireCategory): self
    {
        $this->partenaireCategory = $partenaireCategory;

        return $this;
    }
}
