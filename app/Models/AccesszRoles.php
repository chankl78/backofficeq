<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccesszRoles extends Model
{
    use SoftDeletes;

    protected $table = 'Access_z_Roles';

    protected $fillable = ['value'];
}
