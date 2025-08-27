<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoffeeProduct;

class CoffeeProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Espresso Manjehe',
                'description' => 'Bold dan aromatic espresso dengan rasa yang intense. Perfect untuk memulai hari dengan energi maksimal.',
                'price' => 35000,
                'category' => 'hot',
                'features' => ['Premium Quality', 'Strong Taste'],
                'is_featured' => false,
                'whatsapp_text' => 'Halo Coffee Manjehe, saya ingin memesan Espresso Manjehe'
            ],
            [
                'name' => 'Luwak Arabica',
                'description' => 'Rasa istimewa Kopi Luwak Arabica, perpaduan sempurna antara biji Arabica dan sentuhan alam.',
                'price' => 28000,
                'category' => 'hot',
                'features' => ['Pure & Clean', 'Balanced'],
                'is_featured' => false,
                'whatsapp_text' => 'Halo Coffee Manjehe, saya ingin memesan Luwak Arabica'
            ],
            [
                'name' => 'Arabica',
                'description' => 'Nikmati aroma dan rasa kopi Arabika yang khas, sebuah perjalanan rasa yang tak terlupakan.',
                'price' => 32000,
                'category' => 'hot',
                'features' => ['Cold Brew', 'Refreshing'],
                'is_featured' => false,
                'whatsapp_text' => 'Halo Coffee Manjehe, saya ingin memesan Arabica'
            ],
            [
                'name' => 'Biji Robusta Lanang',
                'description' => 'Biji kopi Robusta Lanang premium untuk home brewing. Freshly roasted dengan berbagai pilihan grind size.',
                'price' => 95000,
                'category' => 'beans',
                'features' => ['Home Brewing', 'Fresh Roasted'],
                'is_featured' => true,
                'whatsapp_text' => 'Halo Coffee Manjehe, saya ingin memesan Biji Robusta Lanang'
            ]
        ];

        foreach ($products as $product) {
            $product['product_id'] = 'PRD-' . strtoupper(uniqid());
            if (!isset($product['is_active'])) $product['is_active'] = true;
            CoffeeProduct::create($product);
        }
    }
}