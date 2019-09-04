<?php

namespace App\Models\Configuration;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $fillable = ['resourcegroupcode', 'code', 'resource'];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'roles_resources');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_resources');
    }
}
