<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventTypeRepository")
 */
class EventType {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Events", mappedBy="eventType")
     */
    private $EventType;

    public function __construct() {
        $this->EventType = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEventType(): Collection {
        return $this->EventType;
    }

    public function addEventType(Events $eventType): self {
        if (!$this->EventType->contains($eventType)) {
            $this->EventType[] = $eventType;
            $eventType->setEventType($this);
        }

        return $this;
    }

    public function removeEventType(Events $eventType): self {
        if ($this->EventType->contains($eventType)) {
            $this->EventType->removeElement($eventType);
            // set the owning side to null (unless already changed)
            if ($eventType->getEventType() === $this) {
                $eventType->setEventType(null);
            }
        }

        return $this;
    }

}
