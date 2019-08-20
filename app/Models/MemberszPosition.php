<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberszPosition extends Model
{
    protected $table = 'Members_z_Position';

    public function scopePositionFaker($query)
    {
        return $query->where('notinuse', 0)->whereNotIn('level', array('shq'))->groupBy('code')->orderBy('code');
    }
}
