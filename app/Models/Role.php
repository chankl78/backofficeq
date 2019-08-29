<?php

namespace App\Models;

use App\Models\Configuration\Resource;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    public function resource()
    {
        return $this->belongsToMany(Resource::class, 'roles_resources');
    }
}
