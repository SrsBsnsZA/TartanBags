<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends Controller {

    /**
     * @Route("/about", name="web_about")
     */
    public function index() {
        return $this->render('about/index.html.twig', [
                    'controller_name' => 'AboutController',
        ]);
    }

}
