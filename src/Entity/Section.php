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
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\ManyToMany(targetEntity=Salaries::class, inversedBy="section")
     * @var Collection
     */
    private Collection $salaries;

    /**
     * @ORM\OneToMany(targetEntity=HomeSection::class, mappedBy="section")
     * @var Collection
     */
    private Collection $homeSection;

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
        $this->homeSection = new ArrayCollection();
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
            $salaries->addSection($this);
        }
        return $this;
    }

    public function removeSalaries(Salaries $salaries): self
    {
        if ($this->salaries->contains($salaries)) {
            $this->salaries->removeElement($salaries);
            $salaries->removeSection($this);
        }
        return $this;
    }

    /**
     * @return Collection|HomeSection[]
     */
    public function getSection(): Collection
    {
        return $this->homeSection;
    }

    public function addSection(HomeSection $homeSection): self
    {
        if (! $this->homeSection->contains($homeSection)) {
            $this->homeSection[] = $homeSection;
            $homeSection->setSection($this);
        }
        return $this;
    }

    public function removeSection(HomeSection $homeSection): self
    {
        if ($this->homeSection->removeElement($homeSection)) {
            // set the owning side to null (unless already changed)
            if ($homeSection->getSection() === $this) {
                $homeSection->setSection(null);
            }
        }
        return $this;
    }
}
