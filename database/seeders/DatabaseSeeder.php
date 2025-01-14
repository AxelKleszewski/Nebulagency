<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call(UsersSeeder::class);
        $this->call(VoyagesSeeder::class);
        $this->call(EtapesSeeder::class);
        $this->call(MediasSeeder::class);
        $this->call(AvisSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
