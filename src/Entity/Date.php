<?php

namespace App\Entity;

use App\Repository\DateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DateRepository::class)
 */
class Date
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
    private string $date;

    /**
     * @ORM\OneToMany(targetEntity=VerticalHistory::class, mappedBy="Date")
     * @var Collection
     */
    private Collection $verticalHistory;

    /**
     * @ORM\OneToMany(targetEntity=History::class, mappedBy="Date")
     * @var Collection
     */
    private Collection $history;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function __construct()
    {
        $this->verticalHistory = new ArrayCollection();
        $this->history = new ArrayCollection();
    }

    /**
     * @return Collection|VerticalHistory[]
     */
    public function getVerticalHistory(): Collection
    {
        return $this->verticalHistory;
    }

    public function addVerticalHistory(VerticalHistory $verticalHistory): self
    {
        if (! $this->verticalHistory->contains($verticalHistory)) {
            $this->verticalHistory[] = $verticalHistory;
            $verticalHistory->setDate($this);
        }
        return $this;
    }

    public function removeVerticalHistory(VerticalHistory $verticalHistory): self
    {
        if ($this->verticalHistory->removeElement($verticalHistory)) {
            // set the owning side to null (unless already changed)
            if ($verticalHistory->getDate() === $this) {
                $verticalHistory->setDate(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|History[]
     */
    public function getHistory(): Collection
    {
        return $this->history;
    }

    public function addHistory(History $history): self
    {
        if (! $this->history->contains($history)) {
            $this->history[] = $history;
            $history->setDate($this);
        }
        return $this;
    }

    public function removeHistory(History $history): self
    {
        if ($this->history->removeElement($history)) {
            // set the owning side to null (unless already changed)
            if ($history->getDate() === $this) {
                $history->setDate(null);
            }
        }
        return $this;
    }
}
