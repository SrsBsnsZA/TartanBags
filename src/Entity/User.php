<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table("fos_user")
 * @ORM\Entity
 */
class User extends BaseUser {

    //put your code here
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Events", mappedBy="Event")
     */
    private $events;

//    /**
//     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="User")
//     * @ORM\JoinColumn(nullable=false)
//     */
//    protected $User;

    public function __construct() {
        parent::__construct();
        $this->events = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEvents(): Collection {
        return $this->events;
    }

    public function addEvent(Events $event): self {
        if (!$this->events->contains($event)) {
            $this->events[] = $event;
            $event->setEvent($this);
        }

        return $this;
    }

    public function removeEvent(Events $event): self {
        if ($this->events->contains($event)) {
            $this->events->removeElement($event);
            // set the owning side to null (unless already changed)
            if ($event->getEvent() === $this) {
                $event->setEvent(null);
            }
        }

        return $this;
    }

//    public function getUser() {
//        return $this->User;
//    }
//
//    public function setUser() {
//        return $this->User;
//    }
}
