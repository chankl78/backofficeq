<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberszOrgChart extends Model
{
    protected $table = 'Members_z_OrgChart';

    public function scopeRhq($query)
    {
        return $query->groupBy('rhq')->orderBy('rhq');
    }

    public function scopeRhqAbbv($query)
    {
        return $query->groupBy('rhqabbv')->orderBy('rhqabbv');
    }

    public function scopeZone($query)
    {
        return $query->groupBy('zone')->orderBy('zone');
    }

    public function scopeZoneAbbv($query)
    {
        return $query->groupBy('zoneabbv')->orderBy('zoneabbv');
    }

    public function scopeChapter($query)
    {
        return $query->groupBy('chapter')->orderBy('chapter');
    }

    public function scopeChapAbbv($query)
    {
        return $query->groupBy('chapabbv')->orderBy('chapabbv');
    }
}
