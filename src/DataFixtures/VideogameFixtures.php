<?php

namespace App\DataFixtures;

use App\Entity\Videogame;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VideogameFixtures extends Fixture
{
    public const VIDEOGAME_REFERENCE = "Videogame";
    public function load(ObjectManager $manager): void
    {
        $videogamesArray = [
            "Diablo 4",
            "Assassin's Creed Mirage",
            "Tekken 7"
        ];

        foreach ($videogamesArray as $key => $videogameName) {
            $videogame = new Videogame();
            $videogame->setName($videogameName);
            $manager->persist($videogame);
            $this->addReference(self::VIDEOGAME_REFERENCE . '_' . $key, $videogame);
        }

        $manager->flush();
    }
}
