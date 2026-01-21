<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientSection extends Model
{
    protected $fillable = [
        'title',
        'is_active'
    ];

    public function items()
    {
        return $this->hasMany(ClientItem::class);
    }
}
