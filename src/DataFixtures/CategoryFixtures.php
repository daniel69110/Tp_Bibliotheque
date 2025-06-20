<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Roman', 'Documentaire', 'Science-fiction', 'Biographie'];

        foreach ($categories as $name) {
            $category = new Category();
            $category->setNom($name);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
