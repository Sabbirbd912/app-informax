<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $fillable = ['title', 'is_active'];

    public function products()
    {
        return $this->hasMany(Product::class)
            ->orderBy('order');
    }
}

