<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Map;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MapsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new user();
        $user->setEmail("User@gmail.com")
            ->setUsername("User")
            ->setPassword("$2y$13$3E7rfvENhlVSmcML3edr1Osjlfhf.W6xpflL35L1ydO1Ejtu60DcO");
        $manager->persist($user);
        $user2 = new user();
        $user2->setEmail("zordon@gmail.com")
            ->setUsername("zordon")
            ->setPassword("$2y$13$3E7rfvENhlVSmcML3edr1Osjlfhf.W6xpflL35L1ydO1Ejtu60DcO");
        $manager->persist($user2);
        for ($i = 0; $i < 3; $i++) {
            $Map = new Map();

            $Map->setTitle("Carte$i")
                ->setJson('"{ \"class\": \"GraphLinksModel\",\n  \"nodeDataArray\": [\n{\"key\":-1,\"loc\":\"37.68690164317222 -352.7447325030453\",\"text\":\"omar\"},\n{\"key\":-3,\"loc\":\"-54.94143752381947 -270.1683752114043\",\"text\":\"steve\"},\n{\"key\":-4,\"loc\":\"166.60403317888424 -388.14862158222866\",\"text\":\"hmar\"},\n{\"text\":\"Relations dans le menu \\r\",\"key\":-5,\"loc\":\"341.81285216554846 305.76908217820636\"},\n{\"text\":\"presque tous les cas \\r\",\"key\":-6,\"loc\":\"-262.8000898863427 255.5679801378924\"},\n{\"text\":\"jour \",\"key\":-7,\"loc\":\"-175.80285518066117 -314.9561770390196\"},\n{\"text\":\"en cascade \\r\",\"key\":-8,\"loc\":\"216.64226742862564 78.41826130598892\"},\n{\"text\":\"champ \\r\",\"key\":-9,\"loc\":\"29.184702134716535 -165.29729286718697\"},\n{\"key\":-10,\"loc\":\"171.87524472660286 -139.12090534498896\",\"text\":\"java\"},\n{\"key\":-11,\"loc\":\"-329.1949889120231 -110.54064647776957\",\"text\":\"GL\"}\n],\n  \"linkDataArray\": [\n{\"from\":-1,\"to\":-4,\"points\":[122.98618343126223,-211.99087408723128,146.50682513281564,-220.59593046664003,170.87379590378433,-221.88664213004978,196.0870957441683,-215.5858181428923],\"text\":\"is\"},\n{\"from\":-1,\"to\":-3,\"points\":[67.60895564805911,-202.09515073786105,37.80732396273293,-202.34721359200122,19.028730564701846,-193.29874522670784,-4.741274065589046,-163.44654974162611]},\n{\"from\":-3,\"to\":-1,\"points\":[11.273175453965841,-147.55462493030544,41.07480713929202,-147.5457745246144,59.85340053732311,-156.59424288990778,82.8607415489737,-185.9775469011946]},\n{\"from\":-3,\"to\":-9},\n{\"from\":-3,\"to\":-7},\n{\"from\":-10,\"to\":-9}\n]}"')
                ->setLastmodified(new \DateTime())
                ->setOwner($user);
            $manager->persist($Map);
        }
        $Map = new Map();
        $Map->setTitle("Carte_omar")
            ->setJson('"{ \"class\": \"GraphLinksModel\",\n  \"nodeDataArray\": [\n{\"key\":-1,\"loc\":\"37.68690164317222 -352.7447325030453\",\"text\":\"omar\"},\n{\"key\":-3,\"loc\":\"-54.94143752381947 -270.1683752114043\",\"text\":\"steve\"},\n{\"key\":-4,\"loc\":\"166.60403317888424 -388.14862158222866\",\"text\":\"hmar\"},\n{\"text\":\"Relations dans le menu \\r\",\"key\":-5,\"loc\":\"341.81285216554846 305.76908217820636\"},\n{\"text\":\"presque tous les cas \\r\",\"key\":-6,\"loc\":\"-262.8000898863427 255.5679801378924\"},\n{\"text\":\"jour \",\"key\":-7,\"loc\":\"-175.80285518066117 -314.9561770390196\"},\n{\"text\":\"en cascade \\r\",\"key\":-8,\"loc\":\"216.64226742862564 78.41826130598892\"},\n{\"text\":\"champ \\r\",\"key\":-9,\"loc\":\"29.184702134716535 -165.29729286718697\"},\n{\"key\":-10,\"loc\":\"171.87524472660286 -139.12090534498896\",\"text\":\"java\"},\n{\"key\":-11,\"loc\":\"-329.1949889120231 -110.54064647776957\",\"text\":\"GL\"}\n],\n  \"linkDataArray\": [\n{\"from\":-1,\"to\":-4,\"points\":[122.98618343126223,-211.99087408723128,146.50682513281564,-220.59593046664003,170.87379590378433,-221.88664213004978,196.0870957441683,-215.5858181428923],\"text\":\"is\"},\n{\"from\":-1,\"to\":-3,\"points\":[67.60895564805911,-202.09515073786105,37.80732396273293,-202.34721359200122,19.028730564701846,-193.29874522670784,-4.741274065589046,-163.44654974162611]},\n{\"from\":-3,\"to\":-1,\"points\":[11.273175453965841,-147.55462493030544,41.07480713929202,-147.5457745246144,59.85340053732311,-156.59424288990778,82.8607415489737,-185.9775469011946]},\n{\"from\":-3,\"to\":-9},\n{\"from\":-3,\"to\":-7},\n{\"from\":-10,\"to\":-9}\n]}"')
            ->setLastmodified(new \DateTime())
            ->setOwner($user2);
        $manager->persist($Map);

        $manager->flush();
    }
}
