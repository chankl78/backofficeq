<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventzRole extends Model {

    protected $table = 'Event_z_Role';
    use SoftDeletes;

    public function scopeRole($query)
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

    public function scopeSearch($query, $sSearch)
    {
        return $query->where(function($query) use ($sSearch)
        {
            $query->where('value', 'Like', '%'.$sSearch.'%');
        });
    }

    public static function getFindEventRole($value)
    {
        if (EventzRole::where('value', '=', $value)->count() >= 1) { return true; } else { return false; }
    }

    public static function boot()
    {
        parent::boot();
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
                        //LogsfLogs::postLogs('Update', 26, $record->id, ' - Event Default Table Role - From:  ' . $field . ' - From ' . $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                    }
                }
                return true;
            }
            catch(\Exception $e)
            {
                //LogsfLogs::postLogs('Update', 26, $record->id, ' - Event Default Table Role - ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
            }
        });
    }
}
