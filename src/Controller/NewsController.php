<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController {

    /**
     * @Route("/news", name="web_news")
     */
    public function index() {
        $pg = $this->Judge();
        return $this->render('news/index.html.twig', [
                    'controller_name' => 'NewsController',
                    $pg,
        ]);
    }

    public function Page() {
        $content = ['cta' => [
                ['link' =>
                    ['href' => "asd", "text" => "asd"],
                    'title' => "asdasd"
                ]
            ]
        ];
        $pg['pg'] = ['content' => $content];
        return $pg;
    }

}
