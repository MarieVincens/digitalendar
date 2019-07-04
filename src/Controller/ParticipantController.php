<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Participant;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/participant/{slug}", name="participant_new")
     */
    public function new(Event $event)
    {
        $participant = new Participant();
        $participant->setUser($this->getUser());
        $participant->setEvent($event);

        $em = $this->getDoctrine()->getManager();
        $em->persist($participant);
        $em->flush();

        return $this->redirectToRoute("homepage");
    }
}
