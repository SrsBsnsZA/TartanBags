<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Events;

/**
 * Description of EventController
 *
 * @author CollenNkabinde
 */
class EventController extends Controller {

    public function show($id) {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('App:Event')->find($id);

        if (!$event) {
            throw $this->createNotFoundException('Unable to find events');
        }

        return $this->render('news/index.html.twig', array(
                    'event' => $event
        ));
    }

}
