<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_section_id',
        'title',
        'description',
        'icon',
        'theme_color',
        'button_text',
        'button_link',
        'order',
        'is_active',
    ];

    public function section()
    {
        return $this->belongsTo(ProductSection::class);
    }
}

