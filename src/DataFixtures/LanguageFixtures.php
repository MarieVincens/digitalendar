<?php

namespace App\DataFixtures;

use App\Entity\Language;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LanguageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $anglais = new Language();
        $anglais -> setName("Anglais");
        $manager->persist($anglais);
        $this->setReference("language-anglais", $anglais);

        $francais = new Language();
        $francais -> setName("Français");
        $manager->persist($francais);
        $this->setReference("language-francais", $francais);

        $italien = new Language();
        $italien -> setName("Italien");
        $manager->persist($italien);
        $this->setReference("language-italien", $italien);

        $manager->flush();
    }
}
