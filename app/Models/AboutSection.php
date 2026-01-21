<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutSection extends Model
{
    protected $fillable = ['main_title', 'is_active'];

    /**
     * Get all the cards for this section.
     */
    public function cards(): HasMany
    {
        // This looks for 'about_section_id' on the about_cards table
        return $this->hasMany(AboutCard::class);
    }

    public function content()
    {
        return $this->hasOne(AboutContent::class);
    }
}
