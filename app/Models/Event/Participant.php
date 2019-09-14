<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'rhq',
        'zone',
        'gender',
        'age',
        'nric',
        'chapter',
        'district',
        'position',
        'division',
        'role'
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_participants');
    }
}
