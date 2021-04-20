<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=SectionSalary::class, inversedBy="section")
     * @ORM\JoinColumn(nullable=false)
     * @var SectionSalary|null
     */
    private ?SectionSalary $sectionSalary;

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

    public function getSectionSalary(): ?SectionSalary
    {
        return $this->sectionSalary;
    }

    public function setSectionSalary(?SectionSalary $sectionSalary): self
    {
        $this->sectionSalary = $sectionSalary;

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
