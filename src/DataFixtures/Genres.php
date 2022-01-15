<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Genres extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // create 20 Genre
        $genres = [
            1=>[
                "nom" => "Horror"
            ],
            2=>[
                "nom" => "Adventure"
            ],
            3=>[
                "nom" => "Sport"
            ],
            4=>[
                "nom" => "Romance"
            ],
            5=>[
                "nom" => "Science Fiction"
            ],
            6=>[
                "nom" => "Documentary"
            ],
            7=>[
                "nom" => "Encyclopedia"
            ],
            8=>[
                "nom" => "Manga"
            ],
            9=>[
                "nom" => "Bande Déssinée"
            ],
            10=>[
                "nom" => "Crime"
            ]
        ];

        foreach($genres as $key => $value){
            $genre = new Genre();
            $genre->setNom($value['nom']);
            $manager->persist($genre);
            $this->addReference('genre_'.$key, $genre);
        }

        $manager->flush();
    }
}
