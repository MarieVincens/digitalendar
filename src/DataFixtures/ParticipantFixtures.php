<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $p1 = new Participant();
        $p1->setCreatedAt(new \DateTime("2017-03-14"));
        $p1->setUser($this->getReference("user-marie"));
        $p1->setEvent($this->getReference("event-1"));
        $manager->persist($p1);

        $p2 = new Participant();
        $p2->setCreatedAt(new \DateTime("2018-01-14"));
        $p2->setUser($this->getReference("user-maite"));
        $p2->setEvent($this->getReference("event-3"));
        $manager->persist($p2);

        $p3 = new Participant();
        $p3->setCreatedAt(new \DateTime("2019-02-06"));
        $p3->setUser($this->getReference("user-jerome"));
        $p3->setEvent($this->getReference("event-1"));
        $manager->persist($p3);

        $p4 = new Participant();
        $p4->setCreatedAt(new \DateTime("2017-12-01"));
        $p4->setUser($this->getReference("user-pierre"));
        $p4->setEvent($this->getReference("event-2"));
        $manager->persist($p4);

        $p5 = new Participant();
        $p5->setCreatedAt(new \DateTime("2017-06-23"));
        $p5->setUser($this->getReference("user-tintin"));
        $p5->setEvent($this->getReference("event-3"));
        $manager->persist($p5);

        $p6 = new Participant();
        $p6->setCreatedAt(new \DateTime("2017-09-30"));
        $p6->setUser($this->getReference("user-quirrel"));
        $p6->setEvent($this->getReference("event-3"));
        $manager->persist($p6);

        $manager->flush();
    }

    public function getDependencies(){

        return [
            UserFixtures::class,
            EventFixtures::class
        ];
    }
}
