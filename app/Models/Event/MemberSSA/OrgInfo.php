<?php

namespace App\Models\Event\MemberSSA;

use App\Models\Event\MemberSSA;
use Illuminate\Database\Eloquent\Model;

class OrgInfo extends Model
{
    protected $table = 'members_ssa_org_infos';
    protected $fillable = [
        'position',
        'division',
        'discussion_meeting_day',
    ];

    public function member()
    {
        return $this->belongsTo(MemberSSA::class, 'id', 'member_id');
    }

    public function orgChart()
    {
        return $this->belongsToMany(OrgChart::class, 'org_info_org_chart');
    }
}
