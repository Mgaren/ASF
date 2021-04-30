<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity=CguCategory::class, inversedBy="item")
     * @ORM\JoinColumn(nullable=false)
     * @var CguCategory|null
     */
    private ?CguCategory $cguCategory;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCguCategory(): ?CguCategory
    {
        return $this->cguCategory;
    }

    public function setCguCategory(?CguCategory $cguCategory): self
    {
        $this->cguCategory = $cguCategory;

        return $this;
    }
}
