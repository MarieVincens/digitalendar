<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $paris = new City();
        $paris -> setName("Paris");
        $manager->persist($paris);
        $this->setReference("city-paris", $paris);

        $rennes = new City();
        $rennes -> setName("Rennes");
        $manager->persist($rennes);
        $this->setReference("city-rennes", $rennes);

        $lyon = new City();
        $lyon -> setName("Lyon");
        $manager->persist($lyon);
        $this->setReference("city-lyon", $lyon);

        $lilles = new City();
        $lilles -> setName("Lilles");
        $manager->persist($lilles);
        $this->setReference("city-lilles", $lilles);

        $marseilles = new City();
        $marseilles -> setName("Marseilles");
        $manager->persist($marseilles);
        $this->setReference("city-marseilles", $marseilles);

        $strasbourg = new City();
        $strasbourg -> setName("Strasbourg");
        $manager->persist($strasbourg);
        $this->setReference("city-strasbourg", $strasbourg);

        $manager->flush();
    }
}
