<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Encryptable;

class AccessmAccessRights extends Model
{
    protected $table = 'Access_m_AccessRights';
    use Encryptable;

    protected $encryptable = ['startdate', 'enddate', 'starttime', 'endtime', 'create', 'read', 'update', 'delete', 'void', 'unvoid', 'print'];
}
