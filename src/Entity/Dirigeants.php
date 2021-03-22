<?php

namespace App\Entity;

use App\Repository\DirigeantsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DirigeantsRepository::class)
 */
class Dirigeants
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
     * @ORM\ManyToOne(targetEntity=DirigeantsPost::class, inversedBy="dirigeants")
     * @ORM\JoinColumn(nullable=false)
     * @var DirigeantsPost|null
     */
    private ?DirigeantsPost $dirigeantsPost;

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

    public function getDirigeantsPost(): ?DirigeantsPost
    {
        return $this->dirigeantsPost;
    }

    public function setDirigeantsPost(?DirigeantsPost $dirigeantsPost): self
    {
        $this->dirigeantsPost = $dirigeantsPost;

        return $this;
    }
}
