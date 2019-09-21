<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventmEvent extends Model {

    use SoftDeletes;

    protected $table = 'Event_m_Event';

    public function EventMember()
    {
        return $this->hasMany('EventmRegistration', 'eventid');
    }

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
        else if (Auth::user()->roleid == 'Event Trainer' or Auth::user()->roleid == 'Event Chief Trainer' )
        {
            $value4 = DB::table('Access_m_AccessRights')->where('userid', Auth::user()->id)->where('resourcecode', 'EV04')->where('deleted_at', NULL)->pluck('eventid');
            return $query->where('id', $value4);
        }
        else if (Auth::user()->roleid == 'Single Event Administrator' or Auth::user()->roleid == 'Single Event User' or Auth::user()->roleid == 'Single Event Item User' )
        {
            $value4 = AccessmAccessRights::where('userid', Auth::user()->id)->where('resourcecode', 'EV04')->lists('eventid');
            return $query->whereIn('id', $value4);
        }
        else if (Auth::user()->roleid == 'Event Administrator')
        {
            return $query->whereIn('eventtype', array('Culture', 'Community Service Event', 'Senior Citizen Programme', 'RSVP'));
        }
        else if (Auth::user()->roleid == 'Single Group Administrator' or Auth::user()->roleid == 'Single Group User' )
        {
            $mid = DB::table('Access_m_AccessRights')->where('deleted_at', NULL)->where('userid', Auth::user()->id)->where('resourcecode', 'GP03')->pluck('groupid');
            $value4 = EventmGroup::where('groupid', $mid)->lists('eventid');
            return $query->whereIn('id', $value4);
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'shq')
        {
            return $query->where('shqregistration', '1');
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'rhq')
        {
            return $query->where('regionregistration', '1');
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'zone')
        {
            return $query->where('zoneregistration', '1');
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'chapter')
        {
            return $query->where('chapterregistration', '1');
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'district')
        {
            return $query->where('districtregistration', '1');
        }
        else
        {*/
            return $query;
        //}
    }

    public function scopeMemRegEvent($query)
    {
        return $query->where('memregistration', 1)->where('status', 'Active');
    }

    public function scopeSearch($query, $sSearch)
    {
        return $query->where(function($query) use ($sSearch)
        {
            $query->where('description', 'Like', '%'.$sSearch.'%')
                ->orwhere('eventtype', 'Like', '%'.$sSearch.'%')
                ->orwhere('location', 'Like', '%'.$sSearch.'%')
                ->orwhere('eventdate', 'Like', '%'.$sSearch.'%')
                ->orwhere('status', 'Like', '%'.$sSearch.'%');
        });
    }

    public function scopeActiveStatus($query)
    {
        return $query->where('status', 'Active');
    }

    public static function getFindDuplicateValue($value)
    {
        if (EventmEvent::where('description', '=', $value)->count() >= 1) { return true; } else { return false; }
    }

    public static function getid($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('id');
        return $mid;
    }

    public static function getforwardid($value)
    {
        $mid = DB::table('Event_m_Event')->where('description', $value)->pluck('id');
        return $mid;
    }

    public static function getuniquecode($value)
    {
        $eid = DB::table('Event_m_Registration')->where('uniquecode', $value)->pluck('eventid');
        $mid = DB::table('Event_m_Event')->where('id', $eid)->pluck('uniquecode');
        return $mid;
    }

    public static function getdescid($value)
    {
        $mid = DB::table('Event_m_Event')->where('description', $value)->pluck('id');
        return $mid;
    }

    public static function geteventname($value)
    {
        $eid = DB::table('Event_m_Registration')->where('uniquecode', $value)->pluck('eventid');
        $mid = DB::table('Event_m_Event')->where('id', $eid)->pluck('description');
        return $mid;
    }

    public static function geteventnamebyid($value)
    {
        $mid = DB::table('Event_m_Event')->where('id', $value)->pluck('description');
        return $mid;
    }

    public static function geteventdescription($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('description');
        return $mid;
    }

    public static function geteventtype($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('eventtype');
        if ($mid == 'Pre M and D Kenshu') { return true; } else { return false; }
    }

    public static function getdivisiontype($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('divisiontype');
        return $mid;
    }

    public static function getrsvpeventtype($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('eventtype');
        if ($mid == 'RSVP') { return true; } else { return false; }
    }

    public static function getstudyeventtype($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('eventtype');
        if ($mid == 'Entrance Study Exam') { return true; }
        elseif ($mid == 'Elementary Study Exam') { return true; }
        else { return false; }
    }

    public static function getattuniquecode($value)
    {
        $eid = DB::table('Attendance_m_Attendance')->where('uniquecode', $value)->pluck('eventid');
        $mid = DB::table('Event_m_Event')->where('id', $eid)->pluck('uniquecode');
        return $mid;
    }

    public static function geteventattname($value)
    {
        $eid = DB::table('Attendance_m_Attendance')->where('uniquecode', $value)->pluck('eventid');
        $mid = DB::table('Event_m_Event')->where('id', $eid)->pluck('description');
        return $mid;
    }

    public static function geteventnamepart($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('description');
        return $mid;
    }

    public static function geteventid($value)
    {
        $mid = DB::table('Event_m_Registration')->where('uniquecode', $value)->pluck('eventid');
        return $mid;
    }

    public static function getspecial($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('special');
        return $mid;
    }

    public static function getreadonly($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('readonly');
        return $mid;
    }

    public static function getviewattendance($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('viewattendance');
        return $mid;
    }

    public static function getsessionselect($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('sessionselect');
        return $mid;
    }

    public static function getlanguageselect($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('languageselect');
        return $mid;
    }

    public static function getnationalityselect($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('nationalityselect');
        return $mid;
    }

    public static function getaddnontokang($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('addnontokang');
        return $mid;
    }

    public static function getdirectaccept($value)
    {
        $mid = DB::table('Event_m_Event')->where('uniquecode', $value)->pluck('directaccept');
        return $mid;
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
                        //LogsfLogs::postLogs('Update', 26, $record->id, ' - Event - From:  ' . $field . ' - From ' . $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                    }
                }
                return true;
            }
            catch(\Exception $e)
            {
                //LogsfLogs::postLogs('Update', 26, $record->id, ' - Event - ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
            }
        });
    }

    public function isValid()
    {
        return Validator::make(
            $this->toArray(),
            array(
                'description' => 'required|min:3'
            )
        )->passes();
    }
}
