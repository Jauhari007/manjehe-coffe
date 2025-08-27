<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coffee_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->unique(); // Kolom ID produk unik
            $table->string('image')->nullable(); // Kolom gambar produk
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('category', ['hot', 'cold', 'beans']);
            $table->json('features')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('whatsapp_text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffee_products');
    }
};