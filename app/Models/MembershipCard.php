<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipCard extends Model
{
    protected $fillable = [
        'membership_section_id',
        'title',
        'description',
        'icon_type',
        'icon_value',
        'theme_color',
        'order',
        'is_active'
    ];

    public function section()
    {
        return $this->belongsTo(MembershipSection::class);
    }
}


