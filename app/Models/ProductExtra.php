<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductExtra extends Model
{
    protected $table = 'product_extras';

    protected $fillable = [
        'product_id',
        'name',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
