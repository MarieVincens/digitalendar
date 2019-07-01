<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setTitle();
        $event1->setSlug();
        $event1->setPicture();
        $event1->setDateStart();
        $event1->setDateEnd();
        $event1->setDescription();
        $event1->setPrice();
        $event1->setUrl();
        $event1->setUser($this->getReference(""));
        $event1->setCity($this->getReference(""));
        $event1->addLanguage();


        // $manager->persist($product);

        $manager->flush();
    }
}
