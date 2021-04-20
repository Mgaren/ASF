<?php

namespace App\Entity;

use App\Repository\HomeSectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HomeSectionRepository::class)
 */
class HomeSection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="homeSection")
     * @ORM\JoinColumn(nullable=false)
     * @var Section|null
     */
    private ?Section $section;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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
}
