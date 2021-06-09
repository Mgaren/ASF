<?php

namespace App\Entity;

use App\Repository\SectionCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionCategoryRepository::class)
 */
class SectionCategory
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
     * @ORM\ManyToMany(targetEntity=SectionPlanning::class, mappedBy="sectionCategory")
     * @var Collection
     */
    private Collection $sectionPlanning;

    /**
     * @ORM\ManyToOne(targetEntity=Section::class, inversedBy="sectionCategory")
     * @ORM\JoinColumn(nullable=false)
     * @var Section|null
     */
    private ?Section $section;

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

    public function __toString(): string
    {
        return $this->name;
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

    public function __construct()
    {
        $this->sectionPlanning = new ArrayCollection();
    }

    /**
     * @return Collection|SectionPlanning[]
     */
    public function getSectionPlanning(): Collection
    {
        return $this->sectionPlanning;
    }

    public function addSectionPlanning(SectionPlanning $sectionPlanning): self
    {
        if (! $this->sectionPlanning->contains($sectionPlanning)) {
            $this->sectionPlanning[] = $sectionPlanning;
            $sectionPlanning->addSectionCategory($this);
        }
        return $this;
    }

    public function removeSectionPlanning(SectionPlanning $sectionPlanning): self
    {
        if ($this->sectionPlanning->contains($sectionPlanning)) {
            $this->sectionPlanning->removeElement($sectionPlanning);
            $sectionPlanning->removeSectionCategory($this);
        }
        return $this;
    }
}
