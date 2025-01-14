<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Leni',
            'Lucas',
            'Maxime',
            'Theo',
            'Romain',
            'Axel',
            'Matheo',
            'Victor'
        ];

        foreach ($names as $name) {
            User::factory()->create([
                'name' => $name,
                'email' => strtolower($name) . '@gmail.com', // Adresse Gmail basée sur le nom
                'pseudo' => strtolower($name) . '62',
                'image_url' => "https://militaryhealthinstitute.org/wp-content/uploads/sites/37/2021/08/blank-profile-picture-png.png",
                'password' => 'azerty',
                'email_verified_at' => now(),
            ]);
        }
    }
}
