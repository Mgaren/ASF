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
     * @ORM\Column(type="string", length=255)
     */
    private string $firstsection;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $secondsection;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $thridsection;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $fourthsection;

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

    public function getFirstsection(): ?string
    {
        return $this->firstsection;
    }

    public function setFirstsection(string $firstsection): self
    {
        $this->firstsection = $firstsection;

        return $this;
    }

    public function getSecondsection(): ?string
    {
        return $this->secondsection;
    }

    public function setSecondsection(?string $secondsection): self
    {
        $this->secondsection = $secondsection;

        return $this;
    }

    public function getThridsection(): ?string
    {
        return $this->thridsection;
    }

    public function setThridsection(?string $thridsection): self
    {
        $this->thridsection = $thridsection;

        return $this;
    }

    public function getFourthsection(): ?string
    {
        return $this->fourthsection;
    }

    public function setFourthsection(?string $fourthsection): self
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
