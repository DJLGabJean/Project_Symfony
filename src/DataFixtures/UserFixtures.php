<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public const USER_REFERENCE = "User";

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

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
            // Hashage du mot de passe
            $hashedPassword = $this->passwordEncoder->hashPassword($username, $passwordArray[$key]);
            $username->setPassword($hashedPassword);
            $username->setRoles(["ROLE_USER"]);
            $manager->persist($username);
            $this->addReference(self::USER_REFERENCE . '_' . $key, $username);
        }

        //$user->setEmail(""); A voir plus tard dans la classe User
        $manager->flush();
    }
}