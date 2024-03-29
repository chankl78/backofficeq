<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccesszAccessTypes extends Model
{
    use SoftDeletes;

    protected $table = 'Access_z_AccessTypes';

    protected $fillable = ['value'];
}
