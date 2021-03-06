<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alcohol", mappedBy="category", orphanRemoval=true)
     */
    private $alcohols;

    public function __construct()
    {
        $this->alcohols = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $alcohol->setCategory($this);
        }

        return $this;
    }

    public function removeAlcohol(Alcohol $alcohol): self
    {
        if ($this->alcohols->contains($alcohol)) {
            $this->alcohols->removeElement($alcohol);
            // set the owning side to null (unless already changed)
            if ($alcohol->getCategory() === $this) {
                $alcohol->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
