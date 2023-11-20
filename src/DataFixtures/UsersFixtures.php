<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 9; $i++) {
            $Users = new Users();
            $Users->setEmail("User$i@gmail.com")
                ->setUsername("User$i")
                ->setPassword("testest");
            $manager->persist($Users);
        }
        $manager->flush();
    }
}
