<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        // Superviseur user
        User::create([
            'name' => 'Superviseur User',
            'email' => 'superviseur@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'superviseur',
        ]);
    }
}
