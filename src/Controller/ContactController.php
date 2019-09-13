<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {

    /**
     * @Route("/contact", name="web_contact")
     * @Method("GET|POST")
     */
    public function index(Request $request) {
        $enquiry = new Contact();
        $form = $this->createForm(ContactType::class, $enquiry);

        $this->request = $request;
        if ($request->getMethod() == 'POST') {
            $form->bind($request);


            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                        ->setSubject('Contact enquiry from Example')
                        ->setFrom('contact@example.com')
                        ->setTo($this->container->getParameter('app.emails.contact_email'))
                        ->setBody($this->renderView('contact/contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashbag('blog-notice', 'Your contact enquiry was successfully sent. Thank you!');
                return $this->redirect($this->generateUrl('web_contact'));
            }
        }

        return $this->render('contact/index.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
