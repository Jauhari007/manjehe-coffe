<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		if (!Schema::hasTable('product_images')) {
			Schema::create('product_images', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('coffee_product_id');
				$table->string('image_path'); // relative path inside storage/app/public
				$table->unsignedInteger('sort_order')->default(0);
				$table->boolean('is_primary')->default(false);
				$table->timestamp('created_at')->useCurrent(); // simple timestamp; model has $timestamps = false

				$table->foreign('coffee_product_id')
					->references('id')->on('coffee_products')
					->onDelete('cascade');
				$table->index(['coffee_product_id', 'is_primary']);
			});
		}
	}

	public function down(): void
	{
		Schema::dropIfExists('product_images');
	}
};
