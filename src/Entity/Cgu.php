<?php

namespace App\Entity;

use App\Repository\CguRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CguRepository::class)
 */
class Cgu
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
    private string $description1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(string $description1): self
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(string $description4): self
    {
        $this->description4 = $description4;

        return $this;
    }
}
