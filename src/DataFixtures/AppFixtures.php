<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $hasher
    ) {
    
    }
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setFirstName('Martin')
        ->setLastName('Boizard')
        ->setAge(23)
        ->setUsername('Milao')
        ->setEmail('martinuser@gmail.com')
        ->setRoles(["ROLE_ADMIN"])
        ->setTelephone(0666666)
        ->setPassword($this->hasher->hashPassword($user, 'test1234'));
        $manager->persist($user);
        $manager->flush();
     }
}

