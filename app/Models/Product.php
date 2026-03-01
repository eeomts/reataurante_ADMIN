<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'subcategory_id',
        'product_status_id',
        'name',
        'description',
        'price',
        'image',
        'stock_quantity',
        'is_featured',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function status()
    {
        return $this->belongsTo(PratosStatus::class, 'product_status_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function extras()
    {
        return $this->hasMany(ProductExtra::class);
    }
}
