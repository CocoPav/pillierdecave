<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlcoholRepository")
 */
class Alcohol
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
     * @ORM\ManyToMany(targetEntity="App\Entity\UserBox", mappedBy="alcohols")
     */
    private $userBoxes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="alcohols")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="alcohols")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function __construct()
    {
        $this->userBoxes = new ArrayCollection();
        $this->users = new ArrayCollection();
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
     * @return Collection|UserBox[]
     */
    public function getUserBoxes(): Collection
    {
        return $this->userBoxes;
    }

    public function addUserBox(UserBox $userBox): self
    {
        if (!$this->userBoxes->contains($userBox)) {
            $this->userBoxes[] = $userBox;
            $userBox->addAlcohol($this);
        }

        return $this;
    }

    public function removeUserBox(UserBox $userBox): self
    {
        if ($this->userBoxes->contains($userBox)) {
            $this->userBoxes->removeElement($userBox);
            $userBox->removeAlcohol($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addAlcohol($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeAlcohol($this);
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
