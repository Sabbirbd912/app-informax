<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'testimonial_section_id',
        'name',
        'designation',
        'company',
        'message',
        'photo',
        'order',
        'is_active',
    ];

    public function section()
    {
        return $this->belongsTo(TestimonialSection::class, 'testimonial_section_id');
    }
}
