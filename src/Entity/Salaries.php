<?php

namespace App\Entity;

use App\Repository\SalariesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalariesRepository", repositoryClass=SalariesRepository::class)
 */
class Salaries
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
    private string $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lastname;

    /**
     * @ORM\ManyToMany(targetEntity=SectionSalary::class, mappedBy="salaries")
     * @var Collection
     */
    private Collection $sectionSalary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image = "";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function __construct()
    {
        $this->sectionSalary = new ArrayCollection();
    }

    /**
     * @return Collection|SectionSalary[]
     */
    public function getSectionSalary(): Collection
    {
        return $this->sectionSalary;
    }

    public function addSectionSalary(SectionSalary $sectionSalary): self
    {
        if (! $this->sectionSalary->contains($sectionSalary)) {
            $this->sectionSalary[] = $sectionSalary;
            $sectionSalary->addSalaries($this);
        }
        return $this;
    }

    public function removeSectionSalary(SectionSalary $sectionSalary): self
    {
        if ($this->sectionSalary->contains($sectionSalary)) {
            $this->sectionSalary->removeElement($sectionSalary);
            $sectionSalary->removeSalaries($this);
        }
        return $this;
    }
}
