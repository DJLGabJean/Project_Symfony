<?php

namespace App\DataFixtures;

use App\Entity\Settings;
use DateTimeImmutable;

use Symfony\Component\DateTime\DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SettingsFixtures extends Fixture
{
    public const SETTINGS_REFERENCE = "Settings";
    public function load(ObjectManager $manager): void
    {
        $datesArray = [
            "07-12-2023",
            "25-11-2023",
            "06-06-2017"
        ];

        $statesArray = [
            "Publique",
            "Publique",
            "Privé"
        ];


        $settings1 = new Settings();
        $settings1->setDate(new DateTimeImmutable($datesArray[0]));
        $settings1->setState($statesArray[0]);
        $manager->persist($settings1);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 0, $settings1);

        $settings2 = new Settings();
        $settings2->setDate(new DateTimeImmutable($datesArray[1]));
        $settings2->setState($statesArray[1]);
        $manager->persist($settings2);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 1, $settings2);

        $settings3 = new Settings();
        $settings3->setDate(new DateTimeImmutable($datesArray[2]));
        $settings3->setState($statesArray[2]);
        $manager->persist($settings3);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 2, $settings3);

        $manager->flush();
    }
}
