<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipSection extends Model
{
    protected $fillable = ['title', 'is_active'];

    public function membershipCards()
    {
        return $this->hasMany(MembershipCard::class);
    }
}
