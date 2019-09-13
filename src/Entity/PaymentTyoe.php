<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentTyoeRepository")
 */
class PaymentTyoe {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Payment", mappedBy="PaymentType")
     */
    private $PaymentType;

    public function __construct() {
        $this->PaymentType = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Payment[]
     */
    public function getPaymentType(): Collection {
        return $this->PaymentType;
    }

    public function addPaymentType(Payment $paymentType): self {
        if (!$this->PaymentType->contains($paymentType)) {
            $this->PaymentType[] = $paymentType;
            $paymentType->setPaymentType($this);
        }

        return $this;
    }

    public function removePaymentType(Payment $paymentType): self {
        if ($this->PaymentType->contains($paymentType)) {
            $this->PaymentType->removeElement($paymentType);
            // set the owning side to null (unless already changed)
            if ($paymentType->getPaymentType() === $this) {
                $paymentType->setPaymentType(null);
            }
        }

        return $this;
    }

}
