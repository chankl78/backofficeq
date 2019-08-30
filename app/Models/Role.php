<?php

namespace App\Models;

use App\Models\Configuration\Resource;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    protected $fillable = ['name', 'description'];

    public function resource()
    {
        return $this->belongsToMany(Resource::class, 'roles_resources');
    }
}
