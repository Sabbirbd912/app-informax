<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSection extends Model
{
    protected $fillable = [
        'section_title',
        'map_title',
        'map_embed_url',
        'is_active'
    ];
}

