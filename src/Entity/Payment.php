<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 */
class Payment {

    /**
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Membership", inversedBy="Membership")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membership;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PaymentTyoe", inversedBy="PaymentType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PaymentType;

    public function getId() {
        return $this->id;
    }

    public function getMembership() {
        return $this->membership;
    }

    public function setMembership() {
        return $this->membership;
    }

    public function getPaymentType() {
        return $this->PaymentType;
    }

    public function setPaymentType() {
        return $this->PaymentType;
    }

}
