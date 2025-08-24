<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Ahmad Suhendra',
                'email' => 'ahmad.suhendra@email.com',
                'phone' => '081234567890',
                'message' => 'Saya tertarik dengan produk kopi Arabica yang ada di website. Apakah bisa memesan dalam jumlah besar untuk event kantor?',
                'is_read' => false,
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
            [
                'name' => 'Sari Dewi',
                'email' => 'sari.dewi@gmail.com',
                'phone' => '081234567891',
                'message' => 'Halo, saya ingin tanya apakah ada promo khusus untuk pembelian coffee beans dalam jumlah banyak? Terima kasih.',
                'is_read' => true,
                'created_at' => now()->subHours(5),
                'updated_at' => now()->subHours(4),
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@yahoo.com',
                'phone' => '081234567892',
                'message' => 'Produk kopinya sangat berkualitas! Saya sudah pesan beberapa kali dan selalu puas. Kapan ada varian rasa baru?',
                'is_read' => false,
                'created_at' => now()->subHours(8),
                'updated_at' => now()->subHours(8),
            ],
            [
                'name' => 'Linda Permata',
                'email' => 'linda.permata@hotmail.com',
                'phone' => '081234567893',
                'message' => 'Apakah bisa delivery ke daerah Bekasi? Dan berapa minimum ordernya untuk free ongkir?',
                'is_read' => true,
                'created_at' => now()->subDay()->subHours(3),
                'updated_at' => now()->subDay()->subHours(2),
            ],
            [
                'name' => 'Rizki Pratama',
                'email' => 'rizki.pratama@email.com',
                'phone' => '081234567894',
                'message' => 'Saya mau buka cafe kecil-kecilan, apakah bisa jadi supplier tetap untuk kopi beans? Mohon info harga grosirnya.',
                'is_read' => false,
                'created_at' => now()->subDay()->subHours(6),
                'updated_at' => now()->subDay()->subHours(6),
            ],
        ];

        foreach ($messages as $message) {
            Contact::create($message);
        }
    }
}
