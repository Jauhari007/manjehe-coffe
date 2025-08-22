<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed beberapa contoh kontak untuk development
        if (app()->environment('local')) {
            Contact::create([
                'name' => 'Ahmad Rizki',
                'email' => 'ahmad@example.com',
                'phone' => '+62812345678',
                'message' => 'Halo Coffee Manjehe, saya tertarik dengan produk Arabica Lanang. Bisakah saya mendapat informasi lebih lanjut?'
            ]);

            Contact::create([
                'name' => 'Sari Dewi',
                'email' => 'sari@example.com',
                'phone' => '+62823456789',
                'message' => 'Saya sudah mencoba Espresso Manjehe dan rasanya luar biasa! Apakah ada program langganan?'
            ]);

            Contact::create([
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'phone' => '+62834567890',
                'message' => 'Terima kasih atas pelayanan yang memuaskan. Saya ingin order biji kopi premium untuk cafe saya.'
            ]);
        }
    }
}

?>