<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event_m_Registration extends Model
{
    use SoftDeletes;

    protected $table = 'Event_m_Registration';

    protected $fillable = [
        'uniquecode',
        'auditioncode',
        'ssagroup',
        'eventitem',
        'groupcode',
        'status',
        'role',
        'height',
        'commitwedsat',
        'studentexamperiod',
        'drugallergy',
        'medicalhistory',
        'travelperiod',
        'hypertension',
        'heartdisease',
        'longtermmedication',
        'goodhealth',
        'menstrual',
        'BPReading1',
        'BPReading2',
        'BPReading3',
        'medicalstatus',
        'medicalofficer',
        'medicalremarks',
        'auditionstatus',
        'trainer',
        'auditionremarks',
        'costume1',
        'costume2',
        'costume3',
        'costume4',
        'costume5',
        'costume6',
        'costume7',
        'costume8',
        'costume9',
        'shoes',
        'otherremarks',
        'committeemember',
        'introducer',
        'introducermobile',
    ];

    public function member()
    {
        return $this->belongsTo(Members_m_SSA::class, 'id');
    }

    public function event()
    {
        return $this->belongsTo(Event_m_Event::class, 'id');
    }
}
