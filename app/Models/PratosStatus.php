<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PratosStatus extends Model
{
    protected $table = 'product_statuses';

    protected $fillable = [
        'name',
        'description',
    ];

    public function pratos()
    {
        return $this->hasMany(Product::class, 'product_status_id');
    }
}
