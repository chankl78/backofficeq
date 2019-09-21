<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event_m_Event extends Model
{
    use SoftDeletes;

    protected $table = 'Event_m_Event';

    protected $fillable = [
        'uniquecode',
        'eventdate',
        'location',
        'eventtype',
        'createby',
        'pdpanric',
        'pdpaaddress',
        'pdpatelmobileemail',
        'memregistration',
        'description',
        'status',
    ];

    public function registrations()
    {
        return $this->hasMany(Event_m_Registration::class, 'eventid');
    }

    public function attendances()
    {

    }
}
