<?php

namespace App\Models\Event\MemberSSA;

use Illuminate\Database\Eloquent\Model;

class OrgChart extends Model
{
    protected $fillable = [
        'rhq',
        'rhq_abbr',
        'zone',
        'zone_abbr',
        'chapter',
        'chapter_abbr',
        'district',
    ];

    public function orgInfo()
    {
        return $this->belongsToMany(OrgInfo::class, 'org_info_org_chart');
    }
}
