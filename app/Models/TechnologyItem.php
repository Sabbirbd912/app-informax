<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TechnologyItem extends Model
{
    protected $fillable = [
        'technology_section_id',
        'name',
        'emoji',
        'image',
        'border_color',
        'order',
        'is_active'
    ];

    public function section()
    {
        return $this->belongsTo(TechnologySection::class);
    }
}

