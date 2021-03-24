<?php

namespace App\Entity;

use App\Repository\SectionSalaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionSalaryRepository::class)
 */
class SectionSalary
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
     * @ORM\ManyToMany(targetEntity=Salaries::class, inversedBy="sectionSalary")
     * @var Collection
     */
    private Collection $salaries;

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

    public function __construct()
    {
        $this->salaries = new ArrayCollection();
    }

    /**
     * @return Collection|Salaries[]
     */
    public function getSalaries(): Collection
    {
        return $this->salaries;
    }

    public function addSalaries(Salaries $salaries): self
    {
        if (! $this->salaries->contains($salaries)) {
            $this->salaries[] = $salaries;
            $salaries->addSectionSalary($this);
        }
        return $this;
    }

    public function removeSalaries(Salaries $salaries): self
    {
        if ($this->salaries->contains($salaries)) {
            $this->salaries->removeElement($salaries);
            $salaries->removeSectionSalary($this);
        }
        return $this;
    }
}
