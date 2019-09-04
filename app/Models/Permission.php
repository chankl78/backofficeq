<?php

namespace App\Models;

use App\Models\Configuration\Resource;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'permissions_resources');
    }
}
