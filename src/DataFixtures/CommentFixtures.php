<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Forum;
use App\Entity\User;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public const COMMENT_REFERENCE = 'Comment';
    public function load(ObjectManager $manager): void
    {

        
        $commentsArray = [
            [ //Diablo 4 vaut quoi maintenant?
                "J'hésite à me l'acheter, il est à 40 balles sur steam actuellement, j'aime bien le farm et j'ai entendu dire que la saison 2 avait un peu rehaussé le niveau, des avis les clefs?",
            ],
            [
                "Jeu sympa uniquement si tu kiff les saisons et donc recommencer un perso tout les 6 mois. Sinon il y a pas de end game, une fois lvl 100 (et les glyphes lvl 21) ta tout débloqué, à part éventuellement tester un autre build (et il y en pas non plus 15 par classes) ya plus rien à faire sur ton perso."
            ],
            [
                "J'ai pas joué à la saison 2 mais j'ai fait la 1 et j'ai trouvé ça sympa. Le jeu est pas mal, le farm est cool, le gameplay est sympa, les classes sont assez différentes et les builds aussi. Par contre le jeu est assez répétif"
            ],
            [ //Assassin's Creed Mirage est-il meilleur que Valhalla ?
                "A l'époque je me souviens que Valhalla avait eu un déluge de mauvaises critiques de par ses nombreux bugs et également par le manque de profondeur de l'histoire et de ses personnages finalement peu charismatiques.
                En prenant en compte tout ce qui n'allait pas dans Valhalla ont ils su corriger les choses pour faire un jeu bien meilleur avec ce Mirage ?
                Je me souviens avoir adoré Odyssey par exemple qui était super immersif le tout avec un gameplay très large par rapport aux autres AC. A ce sujet dans celui-ci que pensez-vous des combats ?
                Merci"
            ],
            [
                "Mirage est un retour aux sources, ça plaît ou ça ne plaît pas. Plus rien avoir avec Odyssey et Valhalla, le côté RPG est abandonné, la map est plus petite, les combats sont au second plan et l'infiltration est privilégiée."
            ],
            [ //Lexique Tekken
                "Yo,

                Voilà le topic dédié aux termes / notations de Tekken.
                
                Autant le dire tout de suite, ça peut paraitre indigeste pour les nouveaux joueurs... :hap:
                Néanmoins, si vous êtes vous aussi curieux de comprendre ce que peuvent bien se dire les membres lorsqu'ils parlent dans cet étrange langage codé, il va falloir passer par là !
                
                Une fois assimilé il permet de gagner beaucoup de temps pour noter différents combos, échanger des stratégies, se renseigner et surtout comprendre les autres joueurs, guides, tutos etc puisqu'il s'agit des termes les plus utilisés.
                
                Certains termes présentés ici peuvent vous être utile lorsque vous parlez de jeux de combat de manière générale :ok:
                
                Je me suis permis de récupérer le bon vieux lexique de Tekken Arena (qui n'a jamais cessé d'informer les joueurs depuis toutes ces années) en plus de retirer certaines mécaniques de Tekken 6 et Tekken Tag Tournament 2 qui ne sont plus d'actualité.
                
                -------------------------------------------------------------------------------------------------
                
                https://www.noelshack.com/2017-22-1496192585-yboxj8v-d.jpeg
                
                Commandes
                
                Les attaques :
                
                Poing gauche
                Poing droit
                Pied gauche
                Pied droit
                Les déplacements :
                
                Sur certains jeux on utilise le pavé numérique du PC comme référence pour indiquer les directions, ce qui n'est pas le cas avec Tekken.
                
                f = Forward = Avant
                d = Down = Bas
                b = Backward = Arrière
                u = Up = Haut
                
                n = Neutral = Neutre, position de base lorsque aucun mouvement n'est effectué
                
                df = Diagonale bas avant
                db = Diagonale bas arrière
                uf = Diagonale haut avant
                ub = Diagonale haut arrière
                
                U/D/B/F (majuscule) = Maintenir la touche
                
                qcf = Quarter-circle forward = Quart de cercle avant
                hcf = Half-circle forward = Demi cercle avant
                qcb = Quarter-circle back = Quart de cercle arrière
                hcb = Half-circle back = Demi cercle arrière
                
                Notations
                
                FC = Full crouch = Accroupi
                WS = While standing up = En se relevant
                WR = While running = En courant
                SS = Side step = Déplacement latéral
                SSL = Side step left = Déplacement latéral vers la gauche
                SSR = Side step right = Déplacement latéral vers la droite
                SW = Side walk = Marche latérale
                
                F! = Floor crack = L'effet qui se produit lorsque le sol est détruit détruit
                W! = Wall ='Mur
                , = suivi par
                ~ = tout de suite après
                _ = ou
                + = En même temps
                < = Peut être retardé
                : = Nécessite un just frame
                ° = Appuyer et maintenir
                
                Positions au sol
                
                PLD = play dead = face vers le haut, tête proche
                KND = knockdown = face vers le haut, pieds proches
                SLD = slide = face contre terre, tête proche
                FCD = face down = face contre terre, pieds proches
                
                Propriétés des coups
                
                BT = Backturned = De dos
                FF = Face forward = Avancer vers l'adversaire
                OB = Opponent back = Oblige l'adversaire à tourner le dos
                OC = Opponent crouch = Oblige l'adversaire à s'accroupir
                OS = Oponent Side = Oblige l'adversaire à se mettre de côté
                JG = Starter de juggle
                RC = Recover d'un coup qui force l'accroupissement
                RCj = Maintenir bas durant le mouvement pour s'accroupir
                CH = Counter hit = En contre
                DS = Double over stun : Appuyer sur f pour s'en échapper (la plupart du temps), le DS peut généralement être suivi d'un launcher (ex. Kazuya WS+2 CH)
                FS = Fall back stun (ex. Kazuya WS+2)
                MS = Minor stun (ex. Kazuya df+1, Paul SS+3)
                n'offre généralement pas de launcher
                KS = Kneel stun (ex. Kuma df+1+2, Kazuya f+4)
                peut généralement être suivi d'un launcher
                CS = Crumple stun
                CF = Crumple fall stun, L'adversaire tombe lentement en position KND, offre un combo à l'adversaire
                BS = Block stun, Le coup bloqué assomme quelque peu le personnage qui attaque (ex. Law db+4)
                SH = Stagger hit (ex. Devil df+2)
                GB = Guard break
                TS = Throw shift, coup qui se transforme en chope
                TC = Technically crouching, s'accroupir durant un mouvement
                TJ = Technically jumping, sauter durant un mouvement
                [2] = Modifie les propriétés d'un coup dans une situation donnée (ex. RC[2] sera différent de WS+2)
                (x) = Coup manquant nécessaire pour la suite
                c = Après une notation, signifie counter hit (ex. JGc est un starter en counter)
                co = Modifie les propriétés d'un coup sur un adversaire accroupi (ex. KSco)
                cco = Modifie les propriétés d'un coup en counter sur un adversaire accroupi (ex. FScco)
                
                Portée des coups
                
                l = Low (coup bas, se bloque avec db)
                m = Mid (coup ventral, se bloque avec b)
                h = High (coup haut, se bloque avec b ou s'esquive avec d)
                L = Low touchant les adversaires ou sol
                M = Mid touchant les adversaires ou sol
                H = High touchant les adversaires ou sol
                Sm = Special mid (se bloque avec db ou b))
                ! = Coup imblocable
                (!) = Coup imblocable sous lequel il est possible de se baisser
                [!] = Coup imblocable qui touche l'adversaire au sol
                ","= Coup pouvant être bloqué dans les strings de coups
                
                Conventions
                
                cc = Crouch cancel (accroupi, faire u ou f)
                cd = Crouch dash f, N, d, df (en général)
                iWS = Instant while standing - d, db, N _ d, df, N (en général)
                wgf = Wind godfist f, N, d, df+2
                ewgf = Electric wind godfist f, N, d~df+2
                jf = Just frame (manip très précise)
                big = Big character combo (fonctionne sur les gros persos)
                
                Le lexique des termes barbares.
                
                Frames
                
                La frame c'est l'unité de temps qui sur laquelle on se base pour calculer vitesse et recovery d'une action.
                Quand on met un coup, il va mettre un certains nombre de frames à toucher et un autre nombre de frames pour 'revenir'
                Car il y a effectivement un 'temps mort' entre chacun des coups que l'on va mettre.
                
                Donc concrètement :
                
                Joueur A met un coup qui va sortir à 10 frames, le coup touche joueur B qui se voit infliger un malus (on prendra 7 de malus pour l'exemple).
                
                A va subir son recovery et joueur va en faire de même. B ayant subi un malus, quand A est à 0 B est encore à -7 !
                Donc disons qu'ensuite A et B sortent tout les deux un coup qui va sortir en 10 frames.
                A = 10 frames
                B = 10+7 = 17 frames
                
                Donc A touche avant et bénéficie d'un counter hit !
                
                Mixup :
                
                Le fait de varier ses coups, ou de faire un enchaînement qui se termine par un coup que l'on doit bloquer debout, ou baissé (ex: Julia -> 1,1,1 ou 1,1,4,3). Plus ou moins la base de Tekken, avec la distance, le timing, etc...
                
                Setup :
                
                Un peu plus difficile à expliquer, mais en gros, amener l'adversaire à faire une erreur, à penser qu'on va exécuter un coup, alors qu'on en prépare un autre, qui le mettra en difficulté, donc...
                
                Juggle :
                
                Idem: la base de Tekken. On préférera ce terme à combo car ce dernier est parfois utilisé pour parler d'enchaînement 'simple' (une suite de coups, mais que l'on peut souvent bloquer à un moment).
                Le juggle est un 'air' combo: suite de coups que l'adversaire ne peut pas bloquer, car il se trouve... dans les airs. Un premier coup envoie l'adversaire dans les airs, puis il s'agit de trouver la distance, le rythme, pour passer une suite de coups, faisant bien sûr un maximum de dommages, ou alors du spectaculaire, pour ruiner le moral de l'adversaire!
                
                Okizeme :
                
                Quand l'adversaire est au sol, si il veut continuer à jouer, il doit se relever. L'okizeme est un terme qui concerne toutes les stratégies par rapport à un joueur qui essaie de se relever (ou qui est au sol, mais ça s'applique moins dans ce sens). Infliger des dommages alors que l'adversaire se relève, c'est (pas) bien, ça.
                
                Reversal :
                
                Contrer le coup d'un adversaire, à son avantage. La manip' doit être effectuée au moment où l'adversaire attaque...
                
                Tech Roll :
                
                Inventé dans T3, donc, il s'agit du fait de pouvoir se relever (rapidement) en roulant sur le côté, au moment où on touche le sol. Il suffit d'appuyer sur une touche au moment de l'impact. A la fin d'un juggle, en général. Attention, certains coups de l'adversaire ne permettent pas de faire le 'tech roll'. Souvent, il faut le faire à la fin d'un juggle de l'adversaire, car sinon, le combo sera poursuivi pour quelques dommages supplémentaires! Pensez donc à tech roller: pour Heihachi, son df + 1, 2 / 1 / CD+ 4 , 4, 1
                peut parfois être 'techrollé', car le CD+4 peut être mal exécuté par l'adversaire, auquel cas, on touche le sol à ce moment...
                
                Cancel :
                
                Annuler un coup amorcé avant qu'il ne touche
                ex:le super coup de Nina db+1+2 on peut l'annuler avec dd de même que la majorité des super coups imparables.
                
                Waves :
                
                C'est le fait de pouvoir faire avec certains persos qui ont un déplacement en vague qui esquive les coups high pleins de f,d~df à la suite (Kaz, Heihachi , Jin, Devil Jin, etc.).
                
                Coup Garanti :
                
                Coup qui touche forcément car l'action précédente a donné un avantage suffisant pour que le coup touche et fasse des damages sans que l'adversaire ne puisse l'éviter (bloquer, stepper, sauter, se baisser)
                
                Coup Safe :
                
                Coup bloqué par votre adversaire qui ne lui laisse pas assez d'avantage pour vous punir.
                
                Natural Combo :
                
                Si le premier coup touche en hit, le deuxième aussi, l'adversaire n'a pas le temps de revenir en garde entre les deux.. Une série peut être naturale sur une plus ou moins grande longueur.
                
                Tech trap :
                
                Coup garanti si l'adversaire techroll.
                
                Just Frame :
                
                Pas avant, pas après !
                C'est un coup qui nécessite un timing très serré.
                
                Chicken :
                
                C'est un reversal de reversal.
                Cette technique permet de frapper votre adversaire s'il abuse des reversal.
                Si vous vous faites contrer 1 ou 3 faites f+1+3
                Si vous vous faites contrer 2 ou 4 faites f+2+4
                
                Liens utiles :
                
                http://www.tekkenarena.com/index.php?option=com_content&view=article&id=160&Itemid=6
                http://www.tekkenzaibatsu.com/wiki/Glossary
                http://www.tekkenzaibatsu.com/wiki/Tekken_Jargon#I
                https://fr.wikipedia.org//wiki/Lexique_du_jeu_de_combat
                http://tekken.wikia.com/wiki/Category:Games
                
                Rage art / Rage Drive: https://www.gameskinny.com/8vkfz/tekken-7-beginners-guide-rage-arts-and-rage-drive-move-list
                
                La frame data : http://rbnorway.org/t7-frame-data/
                
                N'hésitez pas à poser vos questions sur ce topic !"
            ],
            [ //Pourquoi PALWORLD fait autant rager ?
                "Je ne comprends pas pourquoi ce jeu fait autant rager les gens. Il a l'air plutôt sympa, et il est encore en développement. Je pense que les gens sont juste trop habitués à voir des jeux de survie avec des graphismes réalistes, et que du coup, ils ne sont pas prêts à accepter un jeu de survie avec des graphismes cartoon. Je pense que c'est juste une question d'habitude, et que les gens vont finir par s'y faire."
            ],
            [
                "Ce jeu nous rappelle 2 choses\n1 que Game Frique sont des branleurs qui vont devoir se bouger le cul si ils veulent continuer d'être pris au sérieux
                \n2 qu'on a pas besoin de graphismes top tier et d'être super innovant pour casser l'industrie, il suffit d'avoir des idées et d'oser les mettre en pratique"
            ],
            [ //Choisir entre botw ou totk
                "Bonjour,
                Après différentes recherches, j'hésite entre faire botw ou totk. En effet, au vu de la durée de vie, je ne pense pas faire les deux et j'hésite sur lequel faire.
                Je vois des avis qui disent que totk au niveau du gameplay, est meilleur que botw. De même, sur la redondance de la map. Pour certains, il faut absolument faire botw avant de faire totk. Notamment pour découvrir ce qui était une révolution de l'openworld.
                Je précise que ce serait mon premier Zelda. Que me conseillez vous ?"
            ],
            [
                "TOTK. Plus de choses à faire, plus de libertés et de place laissée à l'imagination, plus de découvertes, carte plus grande. Comme a dit mon VDD, tu comprendras ce qui est arrivé dans BOTW"
            ]
        ];
            

        $comment1 = new Comment();
        $comment1->setDescription($commentsArray[0][0]);
        $comment1->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 0));
        $manager->persist($comment1);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 0, $comment1);

        $comment2 = new Comment();
        $comment2->setDescription($commentsArray[1][0]);
        $comment2->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 1));
        $manager->persist($comment2);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 1, $comment2);

        $comment3 = new Comment();
        $comment3->setDescription($commentsArray[2][0]);
        $comment3->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 2));
        $manager->persist($comment3);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 2, $comment3);

        $comment4 = new Comment();
        $comment4->setDescription($commentsArray[3][0]);
        $comment4->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 3));
        $manager->persist($comment4);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 3, $comment4);

        $comment5 = new Comment();
        $comment5->setDescription($commentsArray[4][0]);
        $comment5->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 4));
        $manager->persist($comment5);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 4, $comment5);

        $comment6 = new Comment();
        $comment6->setDescription($commentsArray[5][0]);
        $comment6->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 5));
        $manager->persist($comment6);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 5, $comment6);

        $comment7 = new Comment();
        $comment7->setDescription($commentsArray[6][0]);
        $comment7->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 6));
        $manager->persist($comment7);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 6, $comment7);

        $comment8 = new Comment();
        $comment8->setDescription($commentsArray[7][0]);
        $comment8->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 3));
        $manager->persist($comment8);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 7, $comment8);

        $comment9 = new Comment();
        $comment9->setDescription($commentsArray[8][0]);
        $comment9->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 2));
        $manager->persist($comment9);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 8, $comment9);

        $comment10 = new Comment();
        $comment10->setDescription($commentsArray[9][0]);
        $comment10->setUser($this->getReference(UserFixtures::USER_REFERENCE. '_' . 7));
        $manager->persist($comment10);
        $this->addReference(self::COMMENT_REFERENCE . '_' . 9, $comment10);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }
}


