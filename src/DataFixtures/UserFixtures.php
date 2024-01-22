<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = "User";
    public function load(ObjectManager $manager): void
    {
        $usersArray = [
            "Zinzin_ENT",
            "Okok32",
            "lechatcollant",
            "ChaineConneries",
            "Beidou",
            "Signaleur",
            "-Ryuuzaki"
        ];

        $passwordArray = [
            "rouleX3000",
            "okokokok",
            "miaou",
            "ytbconneries965",
            "warsmachine85",
            "Orelbloques22",
            "123456789"
        ];

        foreach ($usersArray as $key => $user) {
            $username = new User();
            $username->setUsername($user);
            $username->setEmail($user . "@gmail.com");
            $username->setPassword($passwordArray[$key]);
            $username->setRoles(["ROLE_USER"]);
            $manager->persist($username);
            $this->addReference(self::USER_REFERENCE . '_' . $key, $username);
        }

        //$user->setEmail(""); A voir plus tard dans la classe User
        $manager->flush();
    }
}
