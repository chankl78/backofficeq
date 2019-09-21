<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MembersmSSA extends Model
{
    protected $table = 'Members_m_SSA';

    use SoftDeletes;

    protected $fillable = [
        'personid',
        'nric',
        'name',
        'chinesename',
        'gender',
        'uniquecode',
        'searchcode',
        'introducermobile',
        'position',
        'rhq',
        'zone',
        'chapter',
        'district',
        'division',
        'dateofbirth',
        'tel',
        'mobile',
        'email',
        'address',
        'buildingname',
        'unitno',
        'postalcode',
        'emergencytel',
        'emergencymobile',
        'introducermobile',
    ];
}
