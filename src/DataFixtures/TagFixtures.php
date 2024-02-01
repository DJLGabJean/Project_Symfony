<?php

namespace App\DataFixtures;

use App\Entity\Tag;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public const TAG_REFERENCE = "Tag";
    public function load(ObjectManager $manager): void
    {
        $tagsArray = [
            "Review",
            "Opinion",
            "News",
            "Discussion",
            "Question",
            "Soluce",
            "Guide"];

        foreach ($tagsArray as $key => $tagName) {
            $tag = new Tag();
            $tag->setName($tagName);
            $manager->persist($tag);
            $this->addReference(self::TAG_REFERENCE . '_' . $key, $tag);
        }
        
        $manager->flush();
    }
}
