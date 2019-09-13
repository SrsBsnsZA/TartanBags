<?php

namespace App\Controller;

use App\Entity\Score;
use App\Repository\ScoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ScoreController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller {

    /**
     * @Route("/score", name="score")
     */
    public function index() {

        $data = $this->getDoctrine()
                ->getRepository(Score::class)
                ->findAll();

        $score = [];
        $courseRating = [];
        $courseSlopeRating = [];
        $standardSlopeRating = 113;
        foreach ($data as $d) {
            $courseRating = $d->getCourseRating();
            $score = $d->getScore();
            $courseSlopeRating = $d->getSlopeRating();
        }
        $HandicapIndex = (($score - $courseRating) * $standardSlopeRating) / $courseSlopeRating;





        dump($HandicapIndex);
        exit;

//        foreach ($data as $d) {
//            $scores[] = $d->getScore();
//            $scores[$d] += 1;
//
//            //$scores[] = $d->getScore();
//            // $handicapIndex = $strokes - $scores;
//            //$strokes = $d->getStrokes();
//        }
//        dump($data);
//        exit;

        return $this->render('score/index.html.twig', $HandicapIndex);
    }

}
