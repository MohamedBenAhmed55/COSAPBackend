<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use DateTimeInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }    

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername("admin");
        $user->setPassword($this->encoder->encodePassword($user,'0000'));
        $user->setEmail("admin@admin.com");
        $user->setCin("09637925");
        $user->setPhone("90641137");
        $user->setPrenom("Mohamed");
        $user->setNom("Ben Ahmed");
        $user->setDateNai(new \DateTime());
        $user->setDateEmbauche(new \DateTime());
        $user->setGenre("M");
        $user->setAdresse("adr");
        $user->setSalaire(0,55);
        $user->setFax("71235658");
        $user->setPays("Tunisie");
        $user->setImage("img1");
        $user->setMatricule("STG-01");
        $manager->persist($user);
        


        $manager->flush();
    }
}
