<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class EventzEventType extends Model
{
    use SoftDeletes;

    protected $table = 'Event_z_EventType';
    protected $fillable = ['value'];
}
