<?php

namespace App\DataFixtures;

use App\Entity\Forum;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ForumFixtures extends Fixture implements DependentFixtureInterface
{
    public const FORUM_REFERENCE = "Forum";
    public function load(ObjectManager $manager): void
    {

        $forum1 = new Forum();
        $forum1->setName("Diablo 4 vaut quoi maintenant?");
        $forum1->setVideogame($this->getReference(VideogameFixtures::VIDEOGAME_REFERENCE. '_' . 0));
        $forum1->setSettings($this->getReference(SettingsFixtures::SETTINGS_REFERENCE. '_' . 0));
        $forum1->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 0));
        $forum1->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 1));
        $forum1->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 2));
        $forum1->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 0));
        $manager->persist($forum1);
        $this->addReference(self::FORUM_REFERENCE . '_' . 0, $forum1);

        $forum2 = new Forum();
        $forum2->setName("Assassin's Creed Mirage est-il meilleur que Valhalla ?");
        $forum2->setVideogame($this->getReference(VideogameFixtures::VIDEOGAME_REFERENCE. '_' . 1));
        $forum2->setSettings($this->getReference(SettingsFixtures::SETTINGS_REFERENCE. '_' . 1));
        $forum2->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 3));
        $forum2->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 4));
        $forum2->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 4));
        $manager->persist($forum2);
        $this->addReference(self::FORUM_REFERENCE . '_' . 1, $forum2);

        $forum3 = new Forum();
        $forum3->setName("Lexique Tekken");
        $forum3->setVideogame($this->getReference(VideogameFixtures::VIDEOGAME_REFERENCE. '_' . 2));
        $forum3->setSettings($this->getReference(SettingsFixtures::SETTINGS_REFERENCE. '_' . 2));
        $forum3->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 5));
        $forum3->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 5));
        $manager->persist($forum3);
        $this->addReference(self::FORUM_REFERENCE . '_' . 2, $forum3);

        $forum4 = new Forum();
        $forum4->setName("Pourquoi PALWORLD fait autant rager ?");
        $forum4->setVideogame($this->getReference(VideogameFixtures::VIDEOGAME_REFERENCE. '_' . 3));
        $forum4->setSettings($this->getReference(SettingsFixtures::SETTINGS_REFERENCE. '_' . 3));
        $forum4->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 6));
        $forum4->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 7));
        $forum4->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 1));
        $forum4->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 3));
        $manager->persist($forum3);
        $this->addReference(self::FORUM_REFERENCE . '_' . 3, $forum4);

        $forum5 = new Forum();
        $forum5->setName("Choisir entre BOTW ou TOTK");
        $forum5->setVideogame($this->getReference(VideogameFixtures::VIDEOGAME_REFERENCE. '_' . 4));
        $forum5->setSettings($this->getReference(SettingsFixtures::SETTINGS_REFERENCE. '_' . 4));
        $forum5->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 8));
        $forum5->addComment($this->getReference(CommentFixtures::COMMENT_REFERENCE. '_' . 9));
        $forum5->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 1));
        $forum5->addTag($this->getReference(TagFixtures::TAG_REFERENCE. '_' . 3));
        $manager->persist($forum5);
        
        //$forum->addCreator(); A créer plus tard dans la classe Forum

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            VideogameFixtures::class,
            SettingsFixtures::class,
            CommentFixtures::class,
            TagFixtures::class,
            UserFixtures::class
        ];
    }
}
