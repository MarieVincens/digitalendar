<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Participant();
        $p1->setCreatedAt();
        $p1->setUser();
        $p1->addEvent();
        $manager->persist($p1);

        $p2 = new Participant();
        $p2->setCreatedAt();
        $p2->setUser();
        $p2->addEvent();
        $manager->persist($p2);

        $p3 = new Participant();
        $p3->setCreatedAt();
        $p3->setUser();
        $p3->addEvent();
        $manager->persist($p3);

        $p4 = new Participant();
        $p4->setCreatedAt();
        $p4->setUser();
        $p4->addEvent();
        $manager->persist($p4);

        $p5 = new Participant();
        $p5->setCreatedAt();
        $p5->setUser();
        $p5->addEvent();
        $manager->persist($p5);

        $p6 = new Participant();
        $p6->setCreatedAt();
        $p6->setUser();
        $p6->addEvent();
        $manager->persist($p6);

        $manager->flush();
    }
}
