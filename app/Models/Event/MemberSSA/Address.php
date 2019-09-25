<?php

namespace App\Models\Event\MemberSSA;

use App\Models\Event\MemberSSA;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'members_ssa_addresses';

    protected $fillable = [
        'address',
        'building',
        'unit',
        'postal_code',
    ];

    public function member()
    {
        return $this->belongsTo(MemberSSA::class, 'id', 'member_id');
    }
}
