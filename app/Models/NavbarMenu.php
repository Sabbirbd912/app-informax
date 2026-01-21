<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavbarMenu extends Model
{
    protected $fillable = [
        'title',
        'link',
        'order',
        'is_active',
    ];
}

