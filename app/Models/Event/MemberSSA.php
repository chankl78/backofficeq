<?php

namespace App\Models\Event;

use App\Models\Event\MemberSSA\Address;
use App\Models\Event\MemberSSA\EmergencyInfo;
use App\Models\Event\MemberSSA\OrgInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberSSA extends Model
{
    use SoftDeletes;

    protected $table = 'members_ssa';

    protected $fillable = [
        'name',
        'chinese_name',
        'birth_date',
        'nric',
        'tel',
        'mobile',
        'email',
        'blood_group',
        'nationality',
        'birth_country',
        'race',
        'gender',
        'occupation',
        'language',
    ];

    public function address()
    {
        return $this->hasOne(Address::class, 'member_id');
    }

    public function orgInfo()
    {
        return $this->hasOne(OrgInfo::class, 'member_id');
    }

    public function emergencyInfo()
    {
        return $this->hasOne(EmergencyInfo::class, 'member_id');
    }

    public function participant()
    {
        return $this->hasMany(Participant::class,'member_id');
    }
}
