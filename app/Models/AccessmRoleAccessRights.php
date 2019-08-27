<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class AccessmRoleAccessRights extends Model
{
    protected $table = 'Access_m_RoleAccessRights';
    use SoftDeletes, Encryptable;

    protected $encryptable = ['startdate', 'enddate', 'starttime', 'endtime', 'create', 'read', 'update', 'delete', 'void', 'unvoid', 'print'];

}
