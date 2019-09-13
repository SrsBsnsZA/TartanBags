<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembershipRepository")
 */
class Membership {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="membership")
     */
    private $Membership;

    public function __construct() {
        $this->Membership = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getMembership(): Collection {
        return $this->Membership;
    }

    public function addMembership(Payment $membership): self {
        if (!$this->Membership->contains($membership)) {
            $this->Membership[] = $membership;
            $membership->setMembership($this);
        }

        return $this;
    }

    public function removeMembership(Payment $membership): self {
        if ($this->Membership->contains($membership)) {
            $this->Membership->removeElement($membership);
            // set the owning side to null (unless already changed)
            if ($membership->getMembership() === $this) {
                $membership->setMembership(null);
            }
        }

        return $this;
    }

}
