<?php

namespace App\DataFixtures;
use Faker;
use App\Entity\Ville;
use App\Entity\Restaurant;
use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $ville = new Ville();

            $ville->setNom($faker->city);
            
                
            
        

            for ($j = 0; $j < 6; $j++) {
                $proprietaire = new Proprietaire();
                $proprietaire->setPrenom($faker->firstName)
                    ->setNom($faker->lastName)
                    ->setDateNaissance($faker->dateTimeBetween('1978-08-01', '1991-06-01'));
                $manager->persist($proprietaire);
                $restaurant = new Restaurant();
                $restaurant->setNom($faker->company)
                    ->setAdresse($faker->address)
                    ->setImage($faker->imageUrl(200, 200, "food"))
                    ->setVille($ville)
                    ->setProprietaire($proprietaire);
                $manager->persist($restaurant);
           

                
        }

        $manager->persist($ville);
    

        
    }
    $manager->flush();
  }
}

