<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientItem extends Model
{
        protected $fillable = [
        'client_section_id',
        'name',
        'icon_type',
        'icon_value',
        'theme_color',
        'order',
        'is_active',
    ];
    public function section()
    {
        return $this->belongsTo(ClientSection::class);
    }
}
