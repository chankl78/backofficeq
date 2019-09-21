<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class EventzEventType extends Model {

    protected $table = 'Event_z_EventType';
    use SoftDeletes;

    public static function scopeRole($query)
    {
        /*if (AccessfCheck::getCheckSYS(Auth::user()->roleid))
        {
            return $query;
        }
        else if (AccessfCheck::getCheckSOF(Auth::user()->roleid))
        {
            return $query;
        }
        else
        {*/
            return $query;
        //}
    }

    public static function getFindDuplicateValue($value)
    {
        if (EventzEventType::where('value', '=', $value)->count() >= 1) { return true; } else { return false; }
    }

    public function scopeSearch($query, $value)
    {
        return $query->where('value', 'Like', $value);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function($post)
        {
            return $post->isValid();
        });

        static::updating(function($record)
        {
            try
            {
                $dirty = $record->getDirty();
                foreach ($dirty as $field => $newdata)
                {
                    $olddata = $record->getOriginal($field);
                    if ($olddata != $newdata)
                    {
                        //LogsfLogs::postLogs('Update', 30, $record->id, ' - Event - Event Type - From:  ' . $field . ' - From ' . $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                    }
                }
                return true;
            }
            catch(\Exception $e)
            {
                //LogsfLogs::postLogs('Update', 6, $record->id, ' - Event - Event Type - ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
            }
        });
    }

    public function isValid()
    {
        return Validator::make(
            $this->toArray(),
            array(
                'value' => 'required|min:3'
            )
        )->passes();
    }
}
