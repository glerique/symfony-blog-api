<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un utilisateur administrateur
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        $hashedPassword = $this->passwordHasher->hashPassword($admin, $_ENV['ADMIN_PASSWORD'] ?? 'admin123');
        $admin->setPassword($hashedPassword);
        $manager->persist($admin);

        // Création d'un utilisateur standard
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles(['ROLE_USER']);
        $hashedPassword = $this->passwordHasher->hashPassword($user, $_ENV['USER_PASSWORD'] ?? 'password123');
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        // Création d'utilisateurs de test supplémentaires
        for ($i = 1; $i <= 5; ++$i) {
            $testUser = new User();
            $testUser->setEmail("test{$i}@example.com");
            $testUser->setRoles(['ROLE_USER']);
            $hashedPassword = $this->passwordHasher->hashPassword($testUser, $_ENV['TEST_PASSWORD'] ?? 'test123');
            $testUser->setPassword($hashedPassword);
            $manager->persist($testUser);
        }

        // Création d'un utilisateur auteur de blog
        $author = new User();
        $author->setEmail('author@example.com');
        $author->setRoles(['ROLE_AUTHOR', 'ROLE_USER']);
        $hashedPassword = $this->passwordHasher->hashPassword($author, $_ENV['AUTHOR_PASSWORD'] ?? 'author123');
        $author->setPassword($hashedPassword);
        $manager->persist($author);

        $manager->flush();
    }
}
