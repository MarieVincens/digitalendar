<?php

namespace App\Controller;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $events = $this->getDoctrine()->getRepository(Event::class)->findAll( [], ['date_end'=>'ASC'], 6);

        return $this->render("default/homepage.html.twig", [
            "events" => $events
        ]);
    }
}