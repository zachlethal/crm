<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Boutique;
use Faker\Factory as Faker;

class BoutiquesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $boutiques = [
            [
                'nom' => 'Supermarché du Coin',
                'telephone' => '0123456789',
                'adresse' => '123 Rue de la Paix, Paris',
                'cart' => 'Cartes de fidélité, tickets restaurants',
                'typeachat' => 'GRO',
                'typeboutique' => 'GMS',
            ],
            [
                'nom' => 'Boutique de Beauté',
                'telephone' => '0987654321',
                'adresse' => '456 Avenue des Champs-Élysées, Paris',
                'cart' => 'Cartes de fidélité, bons de réduction',
                'typeachat' => 'DDS',
                'typeboutique' => 'cosmitique',
            ],
            // Generate more boutiques using Faker
            [
                'nom' => $faker->company,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
                'cart' => 'Cartes de fidélité, bons de réduction',
                'typeachat' => 'GRO',
                'typeboutique' => 'Taba cosmitique',
            ],
            [
                'nom' => $faker->company,
                'telephone' => $faker->phoneNumber,
                'adresse' => $faker->address,
                'cart' => 'Cartes de fidélité, tickets restaurants',
                'typeachat' => 'MIX',
                'typeboutique' => 'superete',
            ],
        ];

        // Insert all boutiques at once for better performance
        Boutique::insert($boutiques);
    }
}
