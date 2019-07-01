<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin -> setUsername("Admin");
        $admin -> setEmail("admin@gmail.com");
        $admin -> setPassword($this->encoder->encodePassword($admin, '1234'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->setReference("user-admin", $admin);

        $user1 = new User();
        $user1 -> setUsername("MarieVincens");
        $user1 -> setEmail("marievincens@gmail.com");
        $user1 -> setPassword($this->encoder->encodePassword($user1, '1234'));
        $user1->setRoles(['ROLE_USER']);
        $manager->persist($user1);
        $this->setReference("user-marie", $user1);

        $user2 = new User();
        $user2 -> setUsername("MaiteAguillon");
        $user2 -> setEmail("maiteaguillon@gmail.com");
        $user2 -> setPassword($this->encoder->encodePassword($user2, '1234'));
        $user2->setRoles(['ROLE_USER']);
        $manager->persist($user2);
        $this->setReference("user-maite", $user2);

        $user3 = new User();
        $user3 -> setUsername("JeromeDubois");
        $user3 -> setEmail("jeromedubois@gmail.com");
        $user3 -> setPassword($this->encoder->encodePassword($user3, '1234'));
        $user3->setRoles(['ROLE_USER']);
        $manager->persist($user3);
        $this->setReference("user-jerome", $user3);

        $user4 = new User();
        $user4 -> setUsername("PierreJehan");
        $user4 -> setEmail("pjehan@gmail.com");
        $user4 -> setPassword($this->encoder->encodePassword($user4, '1234'));
        $user4->setRoles(['ROLE_USER']);
        $manager->persist($user4);
        $this->setReference("user-pierre", $user4);

        $user5 = new User();
        $user5 -> setUsername("Tintin");
        $user5 -> setEmail("tintin@gmail.com");
        $user5 -> setPassword($this->encoder->encodePassword($user5, '1234'));
        $user5->setRoles(['ROLE_USER']);
        $manager->persist($user5);
        $this->setReference("user-tintin", $user5);

        $user6 = new User();
        $user6 -> setUsername("Quirrel");
        $user6 -> setEmail("quirrel@gmail.com");
        $user6 -> setPassword($this->encoder->encodePassword($user6, '1234'));
        $user6->setRoles(['ROLE_USER']);
        $manager->persist($user6);
        $this->setReference("user-quirrel", $user6);

        $manager->flush();
    }
}
