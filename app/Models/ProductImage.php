<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    public $timestamps = false;

    protected $fillable = [
        'coffee_product_id',
        'image_path'
    ];

    protected $appends = ['image_url'];

    public function product()
    {
        return $this->belongsTo(CoffeeProduct::class, 'coffee_product_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return asset('storage/default-product.jpg');
    }

    public function getImagePathAttribute($value)
    {
        return $value ? $value : 'product_images/default-product.jpg';
    }
}
