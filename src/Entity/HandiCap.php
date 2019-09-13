<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HandiCapRepository")
 */
class HandiCap {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Score", mappedBy="Handicap")
     */
    private $Handicap;

    public function __construct() {
        $this->Handicap = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Score[]
     */
    public function getHandicap(): Collection {
        return $this->Handicap;
    }

    public function addHandicap(Score $handicap): self {
        if (!$this->Handicap->contains($handicap)) {
            $this->Handicap[] = $handicap;
            $handicap->setHandicap($this);
        }

        return $this;
    }

    public function removeHandicap(Score $handicap): self {
        if ($this->Handicap->contains($handicap)) {
            $this->Handicap->removeElement($handicap);
            // set the owning side to null (unless already changed)
            if ($handicap->getHandicap() === $this) {
                $handicap->setHandicap(null);
            }
        }

        return $this;
    }

}
