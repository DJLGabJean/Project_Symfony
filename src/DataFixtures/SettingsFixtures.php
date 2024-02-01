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
            "06-06-2017",
            "30-01-2024",
            "31-01-2024"
        ];

        $theme = [
            "Light",
            "Dark",
        ];

        $statesArray = [
            "Publique",
            "Privé"
        ];

        $permissionCommentsArray = [
            true,
            false
        ];


        $settings1 = new Settings();
        $settings1->setDate(new DateTimeImmutable($datesArray[0]));
        $settings1->setState($statesArray[0]);
        $settings1->setTheme($theme[0]);
        $settings1->setAllowComments($permissionCommentsArray[0]);
        $manager->persist($settings1);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 0, $settings1);

        $settings2 = new Settings();
        $settings2->setDate(new DateTimeImmutable($datesArray[1]));
        $settings2->setState($statesArray[1]);
        $settings2->setTheme($theme[1]);
        $settings2->setAllowComments($permissionCommentsArray[1]);
        $manager->persist($settings2);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 1, $settings2);

        $settings3 = new Settings();
        $settings3->setDate(new DateTimeImmutable($datesArray[2]));
        $settings3->setState($statesArray[1]);
        $settings3->setTheme($theme[0]);
        $settings3->setAllowComments($permissionCommentsArray[0]);
        $manager->persist($settings3);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 2, $settings3);

        $settings4 = new Settings();
        $settings4->setDate(new DateTimeImmutable($datesArray[3]));
        $settings4->setState($statesArray[1]);
        $settings4->setTheme($theme[1]);
        $settings4->setAllowComments($permissionCommentsArray[0]);
        $manager->persist($settings4);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 3, $settings4);

        $settings5 = new Settings();
        $settings5->setDate(new DateTimeImmutable($datesArray[4]));
        $settings5->setState($statesArray[0]);
        $settings5->setTheme($theme[1]);
        $settings5->setAllowComments($permissionCommentsArray[0]);
        $manager->persist($settings5);
        $this->addReference(self::SETTINGS_REFERENCE . '_' . 4, $settings5);

        $manager->flush();
    }
}
