<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Boutique; // Assuming your model is named 'Boutique'

class BoutiquesTableSeeder extends Seeder
{
    public function run()
    {
        // Boutique 1
        Boutique::create([
            'nom' => 'Supermarché du Coin',
            'telephone' => '0123456789',
            'adresse' => '123 Rue de la Paix, Paris',
            'cart' => 'Cartes de fidélité, tickets restaurants',
            'typeachat' => 'GRO',
            'typeboutique' => 'GMS',
        ]);

        // Boutique 2
        Boutique::create([
            'nom' => 'Boutique de Beauté',
            'telephone' => '0987654321',
            'adresse' => '456 Avenue des Champs-Élysées, Paris',
            'cart' => 'Cartes de fidélité, bons de réduction',
            'typeachat' => 'DDS',
            'typeboutique' => 'cosmitique',
        ]);

        // Add more boutiques as needed...
    }
}
