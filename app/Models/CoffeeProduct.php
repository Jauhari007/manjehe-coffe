<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'category',
        'features',
        'is_featured',
        'is_active',
        'whatsapp_text'
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'integer'  // Changed from decimal:2 to integer
    ];

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getWhatsappUrlAttribute()
    {
        $text = $this->whatsapp_text ?: "Halo Coffee Manjehe, saya ingin memesan {$this->name}";
        return 'https://wa.me/6281233302500?text=' . urlencode($text);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Relasi ke gambar produk
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'coffee_product_id');
    }

    // Use product_id in URLs instead of numeric id
    public function getRouteKeyName()
    {
        return 'product_id';
    }

    // Allow fallback to numeric id if product_id missing
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('product_id', $value)
            ->orWhere('id', $value)
            ->firstOrFail();
    }
}