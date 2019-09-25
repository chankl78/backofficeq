<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'eventdate',
        'description',
        'status',
        'pdpanric',
        'pdpaaddress',
        'pdpatelmobileemail',
        'memregistration',
    ];

    public function eventType()
    {
        return $this->belongsToMany(EventType::class, 'events_event_types');
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'event_participants');
    }
}
