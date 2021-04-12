<?php

namespace App\Entity;

use App\Repository\VerticalHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VerticalHistoryRepository::class)
 */
class VerticalHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=HistoryDate::class, inversedBy="VerticalHistory")
     * @ORM\JoinColumn(nullable=false)
     * @var HistoryDate|null
     */
    private ?HistoryDate $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image = "";

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?HistoryDate
    {
        return $this->date;
    }

    public function setDate(?HistoryDate $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
