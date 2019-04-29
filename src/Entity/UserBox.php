<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserBoxRepository")
 */
class UserBox
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Box", inversedBy="userBoxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $box;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userBoxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Alcohol", inversedBy="userBoxes")
     */
    private $alcohols;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __construct()
    {
        $this->alcohols = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBox(): ?Box
    {
        return $this->box;
    }

    public function setBox(?Box $box): self
    {
        $this->box = $box;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Alcohol[]
     */
    public function getAlcohols(): Collection
    {
        return $this->alcohols;
    }

    public function addAlcohol(Alcohol $alcohol): self
    {
        if (!$this->alcohols->contains($alcohol)) {
            $this->alcohols[] = $alcohol;
        }

        return $this;
    }

    public function removeAlcohol(Alcohol $alcohol): self
    {
        if ($this->alcohols->contains($alcohol)) {
            $this->alcohols->removeElement($alcohol);
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
