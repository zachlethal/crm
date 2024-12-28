<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use Faker\Factory as Faker;

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        // Add additional products dynamically using Faker
        foreach (range(1, 10) as $index) {
            $produits[] = [
                'marque' => $faker->company,
                'type' => $faker->randomElement(['interieure', 'exterieur']),
                'categorie' => 'Shampooing',
                'gamme' => $faker->word,
                'volume' => $faker->randomFloat(2, 100, 1000), // Random volume between 100 and 1000
                'famille' => 'Soins Cheveux',
                'photo' => 'product_' . $faker->word . '.jpg', // Random image placeholder
            ];
        }

        // Insert all products in one go for better performance
        Produit::insert($produits);
    }
}
