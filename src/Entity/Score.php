<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
 */
class Score {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Score;

    /**
     * @ORM\Column(type="integer")
     */
    private $Handicap;

    /**
     * @ORM\Column(type="integer")
     */
    private $CourseRating;

    /**
     * @ORM\Column(type="integer")
     */
    private $SlopeRating;

    /**
     * @ORM\Column(type="integer")
     */
    private $Strokes;

    public function getId() {
        return $this->id;
    }

    public function getScore() {
        return $this->Score;
    }

    public function setScore(int $Score): self {
        $this->Score = $Score;

        return $this;
    }

    public function getStrokes() {
        return $this->Strokes;
    }

    public function setStrokes(int $Strokes): self {
        $this->Strokes = $Strokes;

        return $this;
    }

    public function getCourseRating() {
        return $this->CourseRating;
    }

    public function setCourseRating(int $CourseRating): self {
        $this->CourseRating = $CourseRating;

        return $this;
    }

    public function getHandicap() {
        return $this->Handicap;
    }

    public function setHandicap(int $Handicap): self {
        $this->Handicap = $Handicap;

        return $this;
    }

    public function getSlopeRating() {
        return $this->SlopeRating;
    }

    public function setSlopeRating(int $SlopeRating): self {
        $this->SlopeRating = $SlopeRating;

        return $this;
    }

}
