<?php

namespace App\Entity;

use App\Repository\CarouselHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarouselHistoryRepository::class)
 */
class CarouselHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }

    public function getImage5(): ?string
    {
        return $this->image5;
    }

    public function setImage5(?string $image5): self
    {
        $this->image5 = $image5;

        return $this;
    }
}
