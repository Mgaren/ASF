<?php

namespace App\Entity;

use App\Repository\SectionPlanningRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionPlanningRepository::class)
 */
class SectionPlanning
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
    private string $day;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $cotisation;

    /**
     * @ORM\ManyToMany(targetEntity=SectionCategory::class, inversedBy="sectionPlanning")
     * @var Collection
     */
    private Collection $sectionCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getCotisation(): ?string
    {
        return $this->cotisation;
    }

    public function setCotisation(?string $cotisation): self
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    public function __construct()
    {
        $this->sectionCategory = new ArrayCollection();
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
            $sectionCategory->addSectionPlanning($this);
        }
        return $this;
    }

    public function removeSectionCategory(SectionCategory $sectionCategory): self
    {
        if ($this->sectionCategory->contains($sectionCategory)) {
            $this->sectionCategory->removeElement($sectionCategory);
            $sectionCategory->removeSectionPlanning($this);
        }
        return $this;
    }
}
