<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventType extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'value'];

    public function event()
    {
        return $this->belongsToMany(Event::class, 'events_event_types');
    }
}
