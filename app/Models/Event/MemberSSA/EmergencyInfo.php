<?php

namespace App\Models\Event\MemberSSA;

use App\Models\Event\MemberSSA;
use Illuminate\Database\Eloquent\Model;

class EmergencyInfo extends Model
{
    protected $table = 'members_ssa_emergency_infos';
    protected $fillable = ['name', 'relationship', 'tel', 'mobile'];

    public function member()
    {
        return $this->belongsTo(MemberSSA::class, 'id', 'member_id');
    }
}
