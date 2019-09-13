<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrophiesRepository")
 */
class Trophies {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Events", mappedBy="Trophies")
     */
    private $Trophies;

    public function __construct() {
        $this->Trophies = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Events[]
     */
    public function getTrophies(): Collection {
        return $this->Trophies;
    }

    public function addTrophy(Events $trophy): self {
        if (!$this->Trophies->contains($trophy)) {
            $this->Trophies[] = $trophy;
            $trophy->setTrophies($this);
        }

        return $this;
    }

    public function removeTrophy(Events $trophy): self {
        if ($this->Trophies->contains($trophy)) {
            $this->Trophies->removeElement($trophy);
            // set the owning side to null (unless already changed)
            if ($trophy->getTrophies() === $this) {
                $trophy->setTrophies(null);
            }
        }

        return $this;
    }

}
