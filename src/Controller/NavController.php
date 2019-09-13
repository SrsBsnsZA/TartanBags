<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NavController extends AbstractController
{
    /**
     * @Route("/nav", name="nav")
     */
    public function index()
    {
        return $this->render('nav/index.html.twig', [
            'controller_name' => 'NavController',
        ]);
    }
}
