<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'discount_price',
        'stock',
        'unit',
        'image',
        'is_active',
        'is_featured',
        'brand',
        'specifications',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    /**
     * Get the category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get order items
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get cart items
     */
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get final price (considering discount)
     */
    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    /**
     * Check if product is on sale
     */
    public function isOnSale(): bool
    {
        return $this->discount_price !== null && $this->discount_price < $this->price;
    }

    /**
     * Check if product is in stock
     */
    public function inStock(): bool
    {
        return $this->stock > 0;
    }
}
