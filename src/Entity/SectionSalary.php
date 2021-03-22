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
     * @ORM\OneToMany(targetEntity=Salaries::class, mappedBy="sectionSalary")
     * @var ArrayCollection
     */
    private ArrayCollection $salaries;

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
            $salaries->setFirstsection($this);
            $salaries->setSecondsection($this);
            $salaries->setThridsection($this);
            $salaries->setFourthsection($this);
        }
        return $this;
    }

    public function removeSalaries(Salaries $salaries): self
    {
        if ($this->salaries->removeElement($salaries)) {
            // set the owning side to null (unless already changed)
            if ($salaries->getFirstsection() === $this) {
                $salaries->setFirstsection(null);
            }
            if ($salaries->getSecondsection() === $this) {
                $salaries->setSecondsection(null);
            }
            if ($salaries->getThridsection() === $this) {
                $salaries->setThridsection(null);
            }
            if ($salaries->getFourthsection() === $this) {
                $salaries->setFourthsection(null);
            }
        }
        return $this;
    }
}
