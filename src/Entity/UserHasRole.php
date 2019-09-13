<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserHasRoleRepository")
 */
class UserHasRole {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Roles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Role;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId() {
        return $this->id;
    }

    public function getRole() {
        return $this->Role;
    }

    public function setRole() {
        return $this->Role;
    }

    public function getUser() {
        return $this->User;
    }

    public function setUser() {
        return $this->User;
    }

}
