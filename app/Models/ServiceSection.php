<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = ['title', 'is_active'];

    public function services()
    {
        return $this->hasMany(Service::class)
                    ->orderBy('order');
    }
}

