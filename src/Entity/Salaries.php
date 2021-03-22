<?php

namespace App\Entity;

use App\Repository\SalariesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalariesRepository::class)
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
     * @ORM\ManyToOne(targetEntity=SectionSalary::class, inversedBy="salaries")
     * @ORM\JoinColumn(nullable=false)
     * @var SectionSalary|null
     */
    private ?SectionSalary $firstsection;

    /**
     * @ORM\ManyToOne(targetEntity=SectionSalary::class, inversedBy="salaries")
     * @ORM\JoinColumn(nullable=true)
     * @var SectionSalary|null
     */
    private ?SectionSalary $secondsection;

    /**
     * @ORM\ManyToOne(targetEntity=SectionSalary::class, inversedBy="salaries")
     * @ORM\JoinColumn(nullable=true)
     * @var SectionSalary|null
     */
    private ?SectionSalary $thridsection;

    /**
     * @ORM\ManyToOne(targetEntity=SectionSalary::class, inversedBy="salaries")
     * @ORM\JoinColumn(nullable=true)
     * @var SectionSalary|null
     */
    private ?SectionSalary $fourthsection;

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

    public function getFirstsection(): ?SectionSalary
    {
        return $this->firstsection;
    }

    public function setFirstsection(?SectionSalary $firstsection): self
    {
        $this->firstsection = $firstsection;

        return $this;
    }

    public function getSecondsection(): ?SectionSalary
    {
        return $this->secondsection;
    }

    public function setSecondsection(?SectionSalary $secondsection): self
    {
        $this->secondsection = $secondsection;

        return $this;
    }

    public function getThridsection(): ?SectionSalary
    {
        return $this->thridsection;
    }

    public function setThridsection(?SectionSalary $thridsection): self
    {
        $this->thridsection = $thridsection;

        return $this;
    }

    public function getFourthsection(): ?SectionSalary
    {
        return $this->fourthsection;
    }

    public function setFourthsection(?SectionSalary $fourthsection): self
    {
        $this->fourthsection = $fourthsection;

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
}
