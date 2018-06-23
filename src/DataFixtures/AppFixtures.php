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

        $manager->persist($roleUser);
        $manager->persist($roleModo);
        $manager->persist($roleAdmin);
        $manager->persist($userModo);
        $manager->persist($userAdmin);
        $manager->persist($userUser1);
        $manager->persist($userUser2);
        $manager->persist($userUser3);
        $manager->persist($userUser4);

        $manager->flush();
    }
}
