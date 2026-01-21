<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    protected $fillable = [
        'about_section_id',
        'title',
        'description',
        'image',
        'image_alt',
        'button_text',
        'button_link',
    ];

    public function section()
    {
        return $this->belongsTo(AboutSection::class);
    }
}
