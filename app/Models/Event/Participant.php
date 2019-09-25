<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    public function member()
    {
        return $this->belongsTo(MemberSSA::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_participants');
    }
}
