<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit; // Assuming your model is named 'Produit'

class ProduitsTableSeeder extends Seeder
{
    public function run()
    {
        // Shampoo 1
        Produit::create([
            'marque' => 'Head & Shoulders',
            'type' => 'exterieur',
            'categorie' => 'Shampooing',
            'gamme' => 'Anti-pelliculaire',
            'volume' => 250.00,
            'famille' => 'Soins Cheveux',
            'photo' => 'head_and_shoulders.jpg', // Placeholder - replace with actual image path
        ]);

        // Shampoo 2
        Produit::create([
            'marque' => 'Pantene',
            'type' => 'interieure',
            'categorie' => 'Shampooing',
            'gamme' => 'Hydratant',
            'volume' => 400.00,
            'famille' => 'Soins Cheveux',
            'photo' => 'pantene.jpg', // Placeholder - replace with actual image path
        ]);

        // Add more shampoos as needed...
    }
}
