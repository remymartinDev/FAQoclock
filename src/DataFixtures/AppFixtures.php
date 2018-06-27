<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\Role;
use App\Entity\Tag;
use App\Entity\User;

use Faker;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $roleUser = new Role();
        $roleUser->setRolename('ROLE_USER');
        $roleUser->setLabel('Utilisateur');
        $roleModo = new Role();
        $roleModo->setRolename('ROLE_MODO');
        $roleModo->setLabel('Moderateur');
        $roleAdmin = new Role();
        $roleAdmin->setRolename('ROLE_ADMIN');
        $roleAdmin->setLabel('Administrateur');

        $tagHistoire = new Tag();
        $tagHistoire->setTagname('Histoire');
        $tagLoisirs = new Tag();
        $tagLoisirs->setTagname('Loisirs');
        $tagSport = new Tag();
        $tagSport->setTagname('Sport');
        $tagSociété = new Tag();
        $tagSociété->setTagname('Société');
        $tagInformatique = new Tag();
        $tagInformatique->setTagname('Informatique');
        $tagGeo = new Tag();
        $tagGeo->setTagname('Géo');
        $tagMusique = new Tag();
        $tagMusique->setTagname('Musique');
        $tagCultureGenerale = new Tag();
        $tagCultureGenerale->setTagname('Culture Générale');

        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin@faqoclock.com');
        $userAdmin->setPassword($this->encoder->encodePassword($userAdmin, 'admin'));
        $userAdmin->setRole($roleAdmin);
        $userModo = new User();
        $userModo->setUsername('modo');
        $userModo->setEmail('modo@faqoclock.com');
        $userModo->setPassword($this->encoder->encodePassword($userModo, 'modo'));
        $userModo->setRole($roleModo);
        $userUser1 = new User();
        $userUser1->setUsername('user1');
        $userUser1->setEmail('user1@faqoclock.com');
        $userUser1->setPassword($this->encoder->encodePassword($userUser1, 'user1'));
        $userUser1->setRole($roleUser);
        $userUser2 = new User();
        $userUser2->setUsername('user2');
        $userUser2->setEmail('user2@faqoclock.com');
        $userUser2->setPassword($this->encoder->encodePassword($userUser2, 'user2'));
        $userUser2->setRole($roleUser);
        $userUser3 = new User();
        $userUser3->setUsername('user3');
        $userUser3->setEmail('user3@faqoclock.com');
        $userUser3->setPassword($this->encoder->encodePassword($userUser3, 'user3'));
        $userUser3->setRole($roleUser);
        $userUser4 = new User();
        $userUser4->setUsername('user4');
        $userUser4->setEmail('user4@faqoclock.com');
        $userUser4->setPassword($this->encoder->encodePassword($userUser4, 'user4'));
        $userUser4->setRole($roleUser);
        $userUser5 = new User();
        $userUser5->setUsername('user5');
        $userUser5->setEmail('user5@faqoclock.com');
        $userUser5->setPassword($this->encoder->encodePassword($userUser5, 'user5'));
        $userUser5->setRole($roleUser);

        $question1 = new Question();
        $question1->setTitle('le fils de qui?');
        $question1->setBody('Si Jésus c\'est le fils de Dieu, Dieu c\'est le fils de qui ?');
        $question1->setBlocked('0');
        $question1->setUser($userUser2);

        $answer101 = new Answer();
        $answer101->setValidated('0');
        $answer101->setBody('parce que fraise');
        $answer101->setBlocked('0');
        $answer101->setQuestion($question1);
        $answer101->setUser($userUser3);
        $answer102 = new Answer();
        $answer102->setValidated('0');
        $answer102->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer102->setBlocked('0');
        $answer102->setQuestion($question1);
        $answer102->setUser($userUser4);
        $answer103 = new Answer();
        $answer103->setValidated('1');
        $answer103->setBody('c\'est le fils de Michael Jordan');
        $answer103->setBlocked('0');
        $answer103->setQuestion($question1);
        $answer103->setUser($userUser5);
        $answer104 = new Answer();
        $answer104->setValidated('0');
        $answer104->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer104->setBlocked('0');
        $answer104->setQuestion($question1);
        $answer104->setUser($userUser1);

        $question2 = new Question();
        $question2->setTitle('52 cartes');
        $question2->setBody('Pourquoi y a-t-il 52 cartes dans un jeu de cartes ?');
        $question2->setBlocked('0');
        $question2->setUser($userUser3);

        $answer201 = new Answer();
        $answer201->setValidated('0');
        $answer201->setBody('parce que fraise');
        $answer201->setBlocked('0');
        $answer201->setQuestion($question2);
        $answer201->setUser($userUser4);
        $answer202 = new Answer();
        $answer202->setValidated('0');
        $answer202->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer202->setBlocked('0');
        $answer202->setQuestion($question2);
        $answer202->setUser($userUser5);
        $answer203 = new Answer();
        $answer203->setValidated('1');
        $answer203->setBody('Les jeux de 52 cartes sont basés sur le calendrier grégorien. Rien n’est laissé au hasard : 4 couleurs pour les 4 saisons, 12 figures (valet, dame et roi de chaque couleur) pour les 12 mois et 52 cartes pour les 52 semaines. Et le plus fort est que si l’on additionne les points de toutes les cartes et du joker, on obtient 365 comme les 365 jours de l’année. Et s’il y a deux jokers, ont obtient 366, soit une année bissextile. Et voilà, la boucle est bouclée !');
        $answer203->setBlocked('0');
        $answer203->setQuestion($question2);
        $answer203->setUser($userUser1);
        $answer204 = new Answer();
        $answer204->setValidated('0');
        $answer204->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer204->setBlocked('0');
        $answer204->setQuestion($question2);
        $answer204->setUser($userUser2);


        $question3 = new Question();
        $question3->setTitle('Jeux Olympiques');
        $question3->setBody('Que représentent les 5 anneaux, symbole des Jeux olympiques ?');
        $question3->setBlocked('0');
        $question3->setUser($userUser4);

        $answer301 = new Answer();
        $answer301->setValidated('0');
        $answer301->setBody('parce que fraise');
        $answer301->setBlocked('0');
        $answer301->setQuestion($question3);
        $answer301->setUser($userUser5);
        $answer302 = new Answer();
        $answer302->setValidated('0');
        $answer302->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer302->setBlocked('0');31);
        $answer302->setUser($userUser1);
        $answer303 = new Answer();
        $answer303->setValidated('1');
        $answer303->setBody('C’est Pierre de Coubertin, créateur des Jeux olympiques modernes, qui a eu l’idée en 1913 de symboliser les Jeux olympiques avec ces 5 anneaux entrelacés. Ils représentent les 5 continents unis par le sport, fraternels et dans la paix.');
        $answer303->setBlocked('0');
        $answer303->setQuestion($question3);
        $answer303->setUser($userUser2);
        $answer304 = new Answer();
        $answer304->setValidated('0');
        $answer304->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer304->setBlocked('0');
        $answer304->setQuestion($question3);
        $answer304->setUser($userUser3);


        $question4 = new Question();
        $question4->setTitle('Origami');
        $question4->setBody('Que signifie le mot « origami » ?');
        $question4->setBlocked('0');
        $question4->setUser($userUser5);

        $answer401 = new Answer();
        $answer401->setValidated('0');
        $answer401->setBody('parce que fraise');
        $answer401->setBlocked('0');
        $answer401->setQuestion($question3);
        $answer401->setUser($userUser1);
        $answer402 = new Answer();
        $answer402->setValidated('0');
        $answer402->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer402->setBlocked('0');
        $answer402->setQuestion($question3);
        $answer402->setUser($userUser2);
        $answer403 = new Answer();
        $answer403->setValidated('1');
        $answer403->setBody('L’origami, cet art délicat du pliage du papier, est un mot japonais qui signifie plier (« oru ») et papier (« kami »). L’origami a sûrement vu le jour en même temps que le papier, en Chine. Mais la tradition du pliage a connu un grand succès au Japon où il est vraiment devenu un art traditionnel (une seule pièce de papier, pas de collage ni de découpage). Le pliage le plus populaire est la grue qui est, au Japon, un symbole de paix et de longévité.');
        $answer403->setBlocked('0');
        $answer403->setQuestion($question3);
        $answer403->setUser($userUser3);
        $answer404 = new Answer();
        $answer404->setValidated('0');
        $answer404->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer404->setBlocked('0');
        $answer404->setQuestion($question3);
        $answer404->setUser($userUser4);


        $question5 = new Question();
        $question5->setTitle('Lapin & tuyau d\'arrosage');
        $question5->setBody('Quelle est la différence entre un lapin et un tuyau d\'arrosage ?');
        $question5->setBlocked('0');
        $question5->setUser($userUser1);

        $answer501 = new Answer();
        $answer501->setValidated('0');
        $answer501->setBody('parce que fraise');
        $answer501->setBlocked('0');
        $answer501->setQuestion($question5);
        $answer501->setUser($userUser2);
        $answer502 = new Answer();
        $answer502->setValidated('0');
        $answer502->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer502->setBlocked('0');
        $answer502->setQuestion($question5);
        $answer502->setUser($userUser3);
        $answer503 = new Answer();
        $answer503->setValidated('1');
        $answer503->setBody('ils sont tous les deux en plastique ... sauf le lapin !');
        $answer503->setBlocked('0');
        $answer503->setQuestion($question5);
        $answer503->setUser($userUser4);
        $answer504 = new Answer();
        $answer504->setValidated('0');
        $answer504->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer504->setBlocked('0');
        $answer504->setQuestion($question5);
        $answer504->setUser($userUser5);


        $question6 = new Question();
        $question6->setTitle('Henri IV');
        $question6->setBody('Quelle est la couleur du cheval blanc d\'Henri IV ?');
        $question6->setBlocked('0');
        $question6->setUser($userUser2);

        $answer601 = new Answer();
        $answer601->setValidated('0');
        $answer601->setBody('parce que fraise');
        $answer601->setBlocked('0');
        $answer601->setQuestion($question6);
        $answer601->setUser($userUser3);
        $answer602 = new Answer();
        $answer602->setValidated('0');
        $answer602->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer602->setBlocked('0');
        $answer602->setQuestion($question6);
        $answer602->setUser($userUser4);
        $answer603 = new Answer();
        $answer603->setValidated('0');
        $answer603->setBody('personne n\'a jamais vraiment su ');
        $answer603->setBlocked('0');
        $answer603->setQuestion($question6);
        $answer603->setUser($userUser5);
        $answer604 = new Answer();
        $answer604->setValidated('0');
        $answer604->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer604->setBlocked('0');
        $answer604->setQuestion($question6);
        $answer604->setUser($userUser1);


        $question7 = new Question();
        $question7->setTitle('24h/24');
        $question7->setBody('Pourquoi les magasins ouverts 24h/24 ont-ils des serrures ?');
        $question7->setBlocked('0');
        $question7->setUser($userUser3);

        $answer701 = new Answer();
        $answer701->setValidated('0');
        $answer701->setBody('parce que fraise');
        $answer701->setBlocked('0');
        $answer701->setQuestion($question7);
        $answer701->setUser($userUser4);
        $answer702 = new Answer();
        $answer702->setValidated('0');
        $answer702->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer702->setBlocked('0');
        $answer702->setQuestion($question7);
        $answer702->setUser($userUser5);
        $answer703 = new Answer();
        $answer703->setValidated('0');
        $answer703->setBody('mmmhmhmmmh ....');
        $answer703->setBlocked('0');
        $answer703->setQuestion($question7);
        $answer703->setUser($userUser1);
        $answer704 = new Answer();
        $answer704->setValidated('0');
        $answer704->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer704->setBlocked('0');
        $answer704->setQuestion($question7);
        $answer704->setUser($userUser2);


        $question8 = new Question();
        $question8->setTitle('l\'oeuf ou la poule');
        $question8->setBody('Qui était là en premier: l\'oeuf ou la poule ?');
        $question8->setBlocked('0');
        $question8->setUser($userUser4);

        $answer801 = new Answer();
        $answer801->setValidated('0');
        $answer801->setBody('parce que fraise');
        $answer801->setBlocked('0');
        $answer801->setQuestion($question8);
        $answer801->setUser($userUser5);
        $answer802 = new Answer();
        $answer802->setValidated('0');
        $answer802->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer802->setBlocked('0');
        $answer802->setQuestion($question8);
        $answer802->setUser($userUser1);
        $answer803 = new Answer();
        $answer803->setValidated('1');
        $answer803->setBody('la poule ! c\'est comme ça , vis avec !');
        $answer803->setBlocked('0');
        $answer803->setQuestion($question8);
        $answer803->setUser($userUser2);
        $answer804 = new Answer();
        $answer804->setValidated('0');
        $answer804->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer804->setBlocked('0');
        $answer804->setQuestion($question8);
        $answer804->setUser($userUser3);


        $question9 = new Question();
        $question9->setTitle('les gens qui s\'aiment');
        $question9->setBody('Pourquoi les gens qui s\'aiment sont-ils toujours un peu les mêmes ?');
        $question9->setBlocked('0');
        $question9->setUser($userUser5);

        $answer901 = new Answer();
        $answer901->setValidated('0');
        $answer901->setBody('parce que fraise');
        $answer901->setBlocked('0');
        $answer901->setQuestion($question9);
        $answer901->setUser($userUser1);
        $answer902 = new Answer();
        $answer902->setValidated('0');
        $answer902->setBody('Philosophiquement ta question déclenche chez moi un Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
        $answer902->setBlocked('0');
        $answer902->setQuestion($question9);
        $answer902->setUser($userUser2);
        $answer903 = new Answer();
        $answer903->setValidated('0');
        $answer903->setBody('');
        $answer903->setBlocked('0');
        $answer903->setQuestion($question9);
        $answer903->setUser($userUser3);
        $answer904 = new Answer();
        $answer904->setValidated('0');
        $answer904->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer904->setBlocked('0');
        $answer904->setQuestion($question9);
        $answer904->setUser($userUser4);


        $question10 = new Question();
        $question10->setTitle('Capitaine Crochet');
        $question10->setBody('Comment s\'appelait le Capitaine Crochet avant de perdre sa main ?');
        $question10->setBlocked('0');
        $question10->setUser($userUser1);

        $answer1001 = new Answer();
        $answer1001->setValidated('0');
        $answer1001->setBody('parce que fraise');
        $answer1001->setBlocked('0');
        $answer1001->setQuestion($question10);
        $answer1001->setUser($userUser5);
        $answer1002 = new Answer();
        $answer1002->setValidated('0');
        $answer1002->setBody('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        lorem');
        $answer1002->setBlocked('0');
        $answer1002->setQuestion($question10);
        $answer1002->setUser($userUser2);
        $answer1003 = new Answer();
        $answer1003->setValidated('1');
        $answer1003->setBody('Jean-Michel. Du coup sa street-credibility n\'était pas au plus haut ...');
        $answer1003->setBlocked('0');
        $answer1003->setQuestion($question10);
        $answer1003->setUser($userUser3);
        $answer1004 = new Answer();
        $answer1004->setValidated('0');
        $answer1004->setBody('trololo les bouffons, pourrissage en règle Fortnite > PUBG');
        $answer1004->setBlocked('0');
        $answer1004->setQuestion($question10);
        $answer1004->setUser($userUser4);


        $manager->persist($roleUser);
        $manager->persist($roleModo);
        $manager->persist($roleAdmin);
        $manager->persist($userModo);
        $manager->persist($userAdmin);
        $manager->persist($userUser1);
        $manager->persist($userUser2);
        $manager->persist($userUser3);
        $manager->persist($userUser4);
        $manager->persist($userUser5);
        $manager->persist($tagHistoire);
        $manager->persist($tagLoisirs);
        $manager->persist($tagSport);
        $manager->persist($tagSociété);
        $manager->persist($tagInformatique);
        $manager->persist($tagGeo);
        $manager->persist($tagMusique);
        $manager->persist($tagCultureGenerale);
        $manager->persist($question1);
        $manager->persist($answer101);
        $manager->persist($answer102);
        $manager->persist($answer103);
        $manager->persist($answer104);
        $manager->persist($question2);
        $manager->persist($answer201);
        $manager->persist($answer202);
        $manager->persist($answer203);
        $manager->persist($answer204);
        $manager->persist($question3);
        $manager->persist($answer301);
        $manager->persist($answer302);
        $manager->persist($answer303);
        $manager->persist($answer304);
        $manager->persist($question4);
        $manager->persist($answer401);
        $manager->persist($answer402);
        $manager->persist($answer403);
        $manager->persist($answer404);
        $manager->persist($question5);
        $manager->persist($answer501);
        $manager->persist($answer502);
        $manager->persist($answer503);
        $manager->persist($answer504);
        $manager->persist($question6);
        $manager->persist($answer601);
        $manager->persist($answer602);
        $manager->persist($answer603);
        $manager->persist($question7);
        $manager->persist($answer701);
        $manager->persist($answer702);
        $manager->persist($answer703);
        $manager->persist($answer704);
        $manager->persist($question8);
        $manager->persist($answer801);
        $manager->persist($answer802);
        $manager->persist($answer803);
        $manager->persist($answer804);
        $manager->persist($question9);
        $manager->persist($answer901);
        $manager->persist($answer902);
        $manager->persist($answer903);
        $manager->persist($answer904);
        $manager->persist($question10);
        $manager->persist($answer1001);
        $manager->persist($answer1002);
        $manager->persist($answer1003);
        $manager->persist($answer1004);

        $manager->flush();
    }
}
