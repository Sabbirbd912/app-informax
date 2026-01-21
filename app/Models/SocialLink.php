<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = [
        'name',
        'url',
        'icon_type',
        'icon_value',
        'theme_color',
        'order',
        'is_active',
    ];
}
