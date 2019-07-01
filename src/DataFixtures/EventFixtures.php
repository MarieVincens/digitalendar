<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Service\Slugger;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class EventFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $event1 = new Event();
        $event1->setTitle("Open Source Summit");
        $event1->setPicture("opensourcesummit.jpg");
        $event1->setDateStart(new \DateTime("2019-12-10"));
        $event1->setDateEnd(new \DateTime("2019-12-11"));
        $event1->setDescription("Nouveau summit cette année!");
        $event1->setPrice("200");
        $event1->setUser($this->getReference("user-quirrel"));
        $event1->setCity($this->getReference("city-paris"));
        $event1->addLanguage($this->getReference("language-anglais"));
        $event1->addLanguage($this->getReference("language-francais"));
        $event1->setIsValid(1);
        $manager->persist($event1);
        $this->setReference("event-1", $event1);

        $event2 = new Event();
        $event2->setTitle("Event numero 2");
        $event2->setPicture("event2.jpg");
        $event2->setDateStart(new \DateTime("2017-10-01"));
        $event2->setDateEnd(new \DateTime("2017-10-03"));
        $event2->setDescription("Nouvel Event!");
        $event2->setPrice("58");
        $event2->setUrl("event2.com");
        $event2->setUser($this->getReference("user-tintin"));
        $event2->setCity($this->getReference("city-rennes"));
        $event2->addLanguage($this->getReference("language-italien"));
        $event2->addLanguage($this->getReference("language-francais"));
        $event2->setIsValid(1);
        $manager->persist($event2);
        $this->setReference("event-2", $event2);

        $event3 = new Event();
        $event3->setTitle("Event numero 3");
        $event3->setPicture("event3.jpg");
        $event3->setDateStart(new \DateTime("2018-10-01"));
        $event3->setDateEnd(new \DateTime("2018-10-03"));
        $event3->setDescription("Nouvel Event pour les riches!");
        $event3->setPrice("832");
        $event3->setUser($this->getReference("user-pierre"));
        $event3->setCity($this->getReference("city-marseilles"));
        $event3->addLanguage($this->getReference("language-italien"));
        $event3->setIsValid(1);
        $manager->persist($event3);
        $this->setReference("event-3", $event3);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies(){

        return [
            UserFixtures::class,
            CityFixtures::class,
            LanguageFixtures::class
        ];
    }
}
