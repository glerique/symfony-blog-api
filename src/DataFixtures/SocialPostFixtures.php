<?php

namespace App\DataFixtures;

use App\Entity\SocialPost;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SocialPostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupérer tous les utilisateurs existants
        $users = $manager->getRepository(User::class)->findAll();

        if (empty($users)) {
            throw new \Exception('Aucun utilisateur trouvé. Assurez-vous que UserFixtures a été exécutée avant.');
        }

        // Créer 20 posts
        for ($i = 0; $i < 20; ++$i) {
            $createdAt = new \DateTimeImmutable($faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'));

            $post = new SocialPost();
            $post->setTitle($faker->sentence(6));
            $post->setContent($faker->text(200)); // Limité à 200 caractères pour être sûr
            $post->setAuthor($faker->randomElement($users));
            $post->setCreatedAt($createdAt);
            $post->setUpdatedAt($createdAt);
            $post->setIsPublished($faker->boolean(80)); // 80% de chance d'être publié

            $manager->persist($post);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
