<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventsRepository")
 */
class Events {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Event;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EventType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Trophies;

    public function getId() {
        return $this->id;
    }

    public function getEvent() {
        return $this->Event;
    }

    public function setEvent(string $Event): self {
        $this->Event = $Event;

        return $this;
    }

    public function getEventType() {
        return $this->EventType;
    }

    public function setEventType(string $EventType): self {
        $this->EventType = $EventType;

        return $this;
    }

    public function getTrophies() {
        return $this->Trophies;
    }

    public function setTrophies(string $Trophies): self {
        $this->Trophies = $Trophies;

        return $this;
    }

}
