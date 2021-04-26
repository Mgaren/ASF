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

    /**
     * @ORM\OneToMany(targetEntity=SectionCategory::class, mappedBy="section")
     * @var Collection
     */
    private Collection $sectionCategory;

    /**
     * @ORM\OneToMany(targetEntity=SectionPlanning::class, mappedBy="section")
     * @var Collection
     */
    private Collection $sectionPlanning;

    /**
     * @ORM\OneToMany(targetEntity=SectionSport::class, mappedBy="section")
     * @var Collection
     */
    private Collection $sectionSport;

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
        $this->sectionCategory = new ArrayCollection();
        $this->sectionPlanning = new ArrayCollection();
        $this->sectionSport = new ArrayCollection();
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
    public function getSectionHome(): Collection
    {
        return $this->homeSection;
    }

    public function addSectionHome(HomeSection $homeSection): self
    {
        if (! $this->homeSection->contains($homeSection)) {
            $this->homeSection[] = $homeSection;
            $homeSection->setSection($this);
        }
        return $this;
    }

    public function removeSectionHome(HomeSection $homeSection): self
    {
        if ($this->homeSection->removeElement($homeSection)) {
            // set the owning side to null (unless already changed)
            if ($homeSection->getSection() === $this) {
                $homeSection->setSection(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|SectionCategory[]
     */
    public function getSectionCategory(): Collection
    {
        return $this->sectionCategory;
    }

    public function addSectionCategory(SectionCategory $sectionCategory): self
    {
        if (! $this->sectionCategory->contains($sectionCategory)) {
            $this->sectionCategory[] = $sectionCategory;
            $sectionCategory->setSection($this);
        }
        return $this;
    }

    public function removeSectionCategory(SectionCategory $sectionCategory): self
    {
        if ($this->sectionCategory->removeElement($sectionCategory)) {
            // set the owning side to null (unless already changed)
            if ($sectionCategory->getSection() === $this) {
                $sectionCategory->setSection(null);
            }
        }
        return $this;
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
            $sectionPlanning->setSection($this);
        }
        return $this;
    }

    public function removeSectionPlanning(SectionPlanning $sectionPlanning): self
    {
        if ($this->sectionPlanning->removeElement($sectionPlanning)) {
            // set the owning side to null (unless already changed)
            if ($sectionPlanning->getSection() === $this) {
                $sectionPlanning->setSection(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|SectionSport[]
     */
    public function getSectionSport(): Collection
    {
        return $this->sectionSport;
    }

    public function addSectionSport(SectionSport $sectionSport): self
    {
        if (! $this->sectionSport->contains($sectionSport)) {
            $this->sectionSport[] = $sectionSport;
            $sectionSport->setSection($this);
        }
        return $this;
    }

    public function removeSectionSport(SectionSport $sectionSport): self
    {
        if ($this->sectionSport->removeElement($sectionSport)) {
            // set the owning side to null (unless already changed)
            if ($sectionSport->getSection() === $this) {
                $sectionSport->setSection(null);
            }
        }
        return $this;
    }
}
