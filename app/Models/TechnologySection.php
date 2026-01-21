<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologySection extends Model
{
    protected $fillable = ['title', 'is_active'];

    public function items()
    {
        return $this->hasMany(TechnologyItem::class);
    }
}
