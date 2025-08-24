<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan semua seeders
        $this->call([
            AdminSeeder::class,
            CoffeeProductSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}

?>