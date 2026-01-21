<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutCard extends Model
{
    protected $fillable = [
        'about_section_id', 
        'title', 
        'content', 
        'icon', 
        'order', 
        'is_active'
    ];

    /**
     * Get the section that owns the card.
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(AboutSection::class, 'about_section_id');
    }
}