<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members_m_SSA extends Model
{
    use SoftDeletes;

    protected $table = 'Members_m_SSA';

    protected $fillable = [
        'searchcode',
        'name',
        'chinesename',
        'dateofbirth',
        'classification',
        'gender',
        'rhq',
        'zone',
        'chapter',
        'district',
        'position',
        'division',
        'nric',
        'tel',
        'mobile',
        'email',
        'address',
        'buildingname',
        'unitno',
        'postalcode',
        'lengthofpractise',
        'language',
        'occupation',
        'countryofbirth',
        'drugallergy',
        'introducer',
        'introducermobile',
        'emergencyname',
        'emergencyrelationship',
        'emergencytel',
        'emergencymobile',
    ];

    public function registrations()
    {
        return $this->hasMany(Event_m_Registration::class, 'memberid');
    }
}
