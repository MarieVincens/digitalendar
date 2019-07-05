<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Participant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    /**
     * @Route("/participant/{slug}", name="participant_new")
     * @IsGranted("ROLE_USER")
     */
    public function new(Event $event)
    {
        $em = $this->getDoctrine()->getManager();

        // Vérifier si l'utilisateur participe déjà
        $participant = $em->getRepository(Participant::class)->findOneBy(["user" => $this->getUser(), "event" => $event]);

        if ($participant) {
            $em->remove($participant); // Supprimer la participation
        } else {
            // Ajouter la participation
            $participant = new Participant();
            $participant->setUser($this->getUser());
            $participant->setEvent($event);

            $em->persist($participant);
        }

            $em->flush();

        return $this->redirectToRoute("event_show", ["slug" => $event->getSlug()]);
    }
}
