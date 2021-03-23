<?php

namespace App\Entity;

use App\Repository\CarouselSectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarouselSectionRepository::class)
 */
class CarouselPartenaire
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image9;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image10;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image11;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image12;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image13;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image14;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image15;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image16;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image17;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image18;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image19;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $image20;

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

    public function getImage6(): ?string
    {
        return $this->image6;
    }

    public function setImage6(?string $image6): self
    {
        $this->image6 = $image6;

        return $this;
    }

    public function getImage7(): ?string
    {
        return $this->image7;
    }

    public function setImage7(?string $image7): self
    {
        $this->image7 = $image7;

        return $this;
    }

    public function getImage8(): ?string
    {
        return $this->image8;
    }

    public function setImage8(?string $image8): self
    {
        $this->image8 = $image8;

        return $this;
    }

    public function getImage9(): ?string
    {
        return $this->image9;
    }

    public function setImage9(?string $image9): self
    {
        $this->image9 = $image9;

        return $this;
    }

    public function getImage10(): ?string
    {
        return $this->image10;
    }

    public function setImage10(?string $image10): self
    {
        $this->image10 = $image10;

        return $this;
    }

    public function getImage11(): ?string
    {
        return $this->image11;
    }

    public function setImage11(?string $image11): self
    {
        $this->image11 = $image11;

        return $this;
    }

    public function getImage12(): ?string
    {
        return $this->image12;
    }

    public function setImage12(?string $image12): self
    {
        $this->image12 = $image12;

        return $this;
    }

    public function getImage13(): ?string
    {
        return $this->image13;
    }

    public function setImage13(?string $image13): self
    {
        $this->image13 = $image13;

        return $this;
    }

    public function getImage14(): ?string
    {
        return $this->image14;
    }

    public function setImage14(?string $image14): self
    {
        $this->image14 = $image14;

        return $this;
    }

    public function getImage15(): ?string
    {
        return $this->image15;
    }

    public function setImage15(?string $image15): self
    {
        $this->image15 = $image15;

        return $this;
    }

    public function getImage16(): ?string
    {
        return $this->image16;
    }

    public function setImage16(?string $image16): self
    {
        $this->image16 = $image16;

        return $this;
    }

    public function getImage17(): ?string
    {
        return $this->image17;
    }

    public function setImage17(?string $image17): self
    {
        $this->image17 = $image17;

        return $this;
    }

    public function getImage18(): ?string
    {
        return $this->image18;
    }

    public function setImage18(?string $image18): self
    {
        $this->image18 = $image18;

        return $this;
    }

    public function getImage19(): ?string
    {
        return $this->image19;
    }

    public function setImage19(?string $image19): self
    {
        $this->image19 = $image19;

        return $this;
    }

    public function getImage20(): ?string
    {
        return $this->image20;
    }

    public function setImage20(?string $image20): self
    {
        $this->image20 = $image20;

        return $this;
    }
}
