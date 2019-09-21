<?php
namespace App\Models;

use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class EventmRegistration extends Model {

    protected $table = 'Event_m_Registration';
    protected $guarded = ['uniquecode','role','status'];

    use SoftDeletes;

    public function Events()
    {
        return $this->belongsTo('EventmEvent', 'id');
    }

    /*public function getNricAttribute($value) { return Crypt::decrypt($value); }
    public function setNricAttribute($value) { $this->attributes['nric'] = Crypt::encrypt($value); }

    public function getTelAttribute($value) { return Crypt::decrypt($value); }
    public function setTelAttribute($value) { $this->attributes['tel'] = Crypt::encrypt($value); }

    public function getMobileAttribute($value) { return Crypt::decrypt($value); }
    public function setMobileAttribute($value) { $this->attributes['mobile'] = Crypt::encrypt($value); }

    public function getEmailAttribute($value) { return Crypt::decrypt($value); }
    public function setEmailAttribute($value) { $this->attributes['email'] = Crypt::encrypt($value); }

    public function getEmergencytelAttribute($value) { return Crypt::decrypt($value); }
    public function setEmergencytelAttribute($value) { $this->attributes['emergencytel'] = Crypt::encrypt($value); }

    public function getEmergencymobileAttribute($value) { return Crypt::decrypt($value); }
    public function setEmergencymobileAttribute($value) { $this->attributes['emergencymobile'] = Crypt::encrypt($value); }

    public function getIntroducermobileAttribute($value) { return Crypt::decrypt($value); }
    public function setIntroducermobileAttribute($value) { $this->attributes['Introducermobile'] = Crypt::encrypt($value); }

    public function getAddressAttribute($value) { return Crypt::decrypt($value); }
    public function setAddressAttribute($value) { $this->attributes['address'] = Crypt::encrypt($value); }

    public function getbuildingnameAttribute($value) { return Crypt::decrypt($value); }
    public function setBuildingnameAttribute($value) { $this->attributes['buildingname'] = Crypt::encrypt($value); }

    public function getUnitnoAttribute($value) { return Crypt::decrypt($value); }
    public function setUnitnoAttribute($value) { $this->attributes['unitno'] = Crypt::encrypt($value); }

    public function getPostalcodeAttribute($value) { return Crypt::decrypt($value); }
    public function setPostalcodeAttribute($value) { $this->attributes['postalcode'] = Crypt::encrypt($value); }*/

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
        else if (Session::get('gakkaiuserpositionlevel') == 'district')
        {
            return $query->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'));
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'chapter')
        {
            return $query->where('chapter', Session::get('gakkaiuserchapter'));
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'zone')
        {
            return $query->where('zone', Session::get('gakkaiuserzone'));
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'rhq')
        {
            return $query->where('rhq', Session::get('gakkaiuserrhq'));
        }
        else if (Session::get('gakkaiuserpositionlevel') == 'shq')
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
            $query->where('name', 'Like', '%'.$sSearch.'%')
                ->orwhere('position', 'Like', '%'.$sSearch.'%')
                ->orwhere('rhq', 'Like', '%'.$sSearch.'%')
                ->orwhere('zone', 'Like', '%'.$sSearch.'%')
                ->orwhere('chapter', 'Like', '%'.$sSearch.'%')
                ->orwhere('district', 'Like', '%'.$sSearch.'%')
                ->orwhere('status', 'Like', '%'.$sSearch.'%')
                ->orwhere('division', 'Like', '%'.$sSearch.'%')
                ->orwhere('groupcode', 'Like', '%'.$sSearch.'%')
                ->orwhere('auditioncode', 'Like', '%'.$sSearch.'%')
                ->orwhere('cardno', 'Like', '%'.$sSearch.'%')
                ->orwhere('role', 'Like', '%'.$sSearch.'%')
                ->orwhere('eventitem', 'Like', '%'.$sSearch.'%')
                ->orwhere('costume9', 'Like', '%'.$sSearch.'%')
                ->orwhere('ssagroup', 'Like', '%'.$sSearch.'%')
                ->orwhere('created_at', 'Like', '%'.$sSearch.'%');
        });
    }

    public function scopeEvent($query, $value)
    {
        if (Auth::user()->roleid == 'Single Group Administrator' or Auth::user()->roleid == 'Single Group User')
        {
            $value2 = DB::table('Access_m_AccessRights')->where('userid', Auth::user()->id)->groupBy('userid')->pluck('groupid');
            $value3 = DB::table('Event_m_Group')->where('groupid', $value2)->pluck('name');
            return $query->where('eventid', $value)->where('ssagroup', $value3);
        }
        else if (Auth::user()->roleid == 'Single Event Item User' or Auth::user()->roleid == 'Event Chief Trainer')
        {
            $value4 = DB::table('Access_m_AccessRights')->where('userid', Auth::user()->id)->where('resourcecode', 'EV04')->groupBy('userid')->pluck('eventitem');
            return $query->where('eventid', $value)->whereIn('role', array('Performer', 'Trainer',
                'Chief Trainer', 'Block IC', 'Assistant Block IC', 'Assistant Chief Trainer',
                'Assistant Choreographer', 'Choreographer', 'Display IC', 'Plotter'));
        }
        else if (Auth::user()->roleid == 'Event Trainer')
        {
            $value4 = DB::table('Access_m_AccessRights')->where('userid', Auth::user()->id)->where('resourcecode', 'EV04')->groupBy('userid')->pluck('eventitem');
            $value5 = DB::table('Access_m_Users')->where('id', Auth::user()->id)->pluck('memberid');
            $value6 = DB::table('Members_m_SSA')->where('id', $value5)->pluck('zone');

            return $query->where('eventid', $value)->where('eventitem', $value4)->where('zone', $value6);
        }
        else
        {
            return $query->where('eventid', '=', $value);
        }
    }

    public function scopeSTSubscription($query)
    {
        return $query->where('subscriptionst', 1)->where('status', 'Accepted')->where('stenddate', '>', new DateTime());
    }

    public function scopeProgPerformer($query, $value)
    {
        return $query->where('eventid', $value)->select('rhq', DB::raw( 'SUM(CASE WHEN division = "MD" THEN 1 End) as MD, 
            SUM(CASE WHEN division = "WD" THEN 1 End) as WD, SUM(CASE WHEN division = "YM" THEN 1 End) as YM, 
            SUM(CASE WHEN division = "YW" THEN 1 End) as YW, SUM(CASE WHEN division = "PD" THEN 1 End) as PD, 
            SUM(CASE WHEN division IS NULL THEN 1 WHEN division IN ("UN", "", "-") THEN 1 End) as UnKnown, Count(name) as Total, SUM(CASE WHEN position = "NF" THEN 1 End) as NewFriend'))
            ->groupBy('rhq');
    }

    public function scopeProgPerformerOnly($query, $value)
    {
        return $query->where('eventid', $value)->whereIn('role', array('Performer', 'Participant'))->where('status', 'Accepted')->select('rhq', DB::raw( 'SUM(CASE WHEN division = "MD" THEN 1 End) as MD, 
            SUM(CASE WHEN division = "WD" THEN 1 End) as WD, SUM(CASE WHEN division = "YM" THEN 1 End) as YM, 
            SUM(CASE WHEN division = "YW" THEN 1 End) as YW, SUM(CASE WHEN division = "PD" THEN 1 End) as PD, 
            SUM(CASE WHEN division IS NULL THEN 1 WHEN division IN ("UN", "", "-") THEN 1 End) as UnKnown, Count(name) as Total, SUM(CASE WHEN position = "NF" THEN 1 End) as NewFriend'))
            ->groupBy('rhq');
    }

    public function scopeProgPerformerOnlyAllStatus($query, $value)
    {
        return $query->where('eventid', $value)->whereIn('role', array('Performer', 'Participant'))->select('rhq', DB::raw('SUM(CASE WHEN division = "MD" THEN 1 End) as MD, 
            SUM(CASE WHEN division = "WD" THEN 1 End) as WD, SUM(CASE WHEN division = "YM" THEN 1 End) as YM, 
            SUM(CASE WHEN division = "YW" THEN 1 End) as YW, SUM(CASE WHEN division = "PD" THEN 1 End) as PD, 
            SUM(CASE WHEN division IS NULL THEN 1 WHEN division IN ("UN", "", "-") THEN 1 End) as UnKnown, Count(name) as Total, SUM(CASE WHEN position = "NF" THEN 1 End) as NewFriend'))
            ->groupBy('rhq');
    }

    public function scopeProgRoleByStatus($query, $value)
    {
        return $query->where('eventid', $value)->select('role', DB::raw('SUM(CASE WHEN status = "Accepted" THEN 1 End) as Accepted, 
            SUM(CASE WHEN status = "Processing" THEN 1 End) as Processing, SUM(CASE WHEN status = "Rejected" THEN 1 End) as Rejected, 
            SUM(CASE WHEN status = "Interested" THEN 1 End) as Interested, SUM(CASE WHEN status = "Pending" THEN 1 End) as Pending, 
            SUM(CASE WHEN status = "Withdrawn" THEN 1 End) as Withdrawn, SUM(CASE WHEN status = "Reserved" THEN 1 End) as Reserved, Count(name) as Total'))
            ->groupBy('role');
    }

    public function scopePreKenshu($query)
    {
        $mid = DB::table('Event_m_Event')->where('eventtype', 'Pre M and D Kenshu')->get(array('id'));
        return $query->whereIn('eventid', $mid)->where('deleted_at', NULL);
    }

    public static function scopeStudyExamPassed($query)
    {
        return $query->where('Event_m_Registration.studyexamstatus', 'Passed')->whereIn('Event_m_Event.eventtype', array('Entrance Study Exam', 'Elementary Study Exam'))
            ->select('Event_m_Event.eventdate', 'Event_m_Event.location', 'Event_m_Event.eventtype', 'Event_m_Event.description', 'Event_m_Registration.eventname', 'Event_m_Registration.name', 'Event_m_Registration.rhq', 'Event_m_Registration.zone', 'Event_m_Registration.chapter', 'Event_m_Registration.district', 'Event_m_Registration.division', 'Event_m_Registration.position', 'Event_m_Registration.language', 'Event_m_Registration.studyexamstatus', 'Event_m_Registration.studyexamgrade', 'Event_m_Registration.uniquecode', 'Event_m_Registration.created_at')
            ->leftJoin('Event_m_Event', 'Event_m_Event.id', '=', 'Event_m_Registration.eventid');
    }

    public function scopeSTSubscriptionMailer($query, $value)
    {
        $mid = "";
        if ($value == 1 || $value == 3 || $value == 5 || $value == 7 || $value == 8 || $value == 10 || $value == 12)
        {
            $mid = '31';
        }
        else if ($value == 2) { $mid = '28'; }
        else { $mid == '30'; }

        if ($value == 1)
        {
            $year = strtotime(date('Y') + 1);
            return $query->where('subscriptionst', 1)->where('status', 'Accepted')->where('stenddate', '>', $year . '-' . $value . '-' . $mid);
        }
        else
        {
            return $query->where('subscriptionst', 1)->where('status', 'Accepted')->where('stenddate', '>', date('Y') . '-' . $value . '-' . $mid);
        }
    }

    public static function getCheckEventGroupCode($id, $value, $value3)
    {
        if (EventmRegistration::where('id', '=', $value3)->where('groupcode', '=', $value)->count() >= 1) { return false; }
        elseif (EventmRegistration::where('eventid', '=', $id)->where('groupcode', '=', $value)->count() >= 1) { return true; }
        else { return false; }
    }

    public static function getEventMemberDuplicate($value, $value2)
    {
        if (DB::table('Event_m_Registration')->where('eventid', $value2)->where('memberid', $value)->where('deleted_at', NULL)->count() >= 1)
        {
            return true;
        }
        else { return false; }
    }

    public static function getEventMemberDuplicateID($value, $value2)
    {
        $mid = DB::table('Event_m_Registration')->where('eventid', $value2)->where('memberid', $value)->where('deleted_at', NULL)->pluck('id');
        return $mid;
    }

    public static function getEventMemberForwardDuplicate($value, $value2)
    {
        if (DB::table('Event_m_Registration')->where('eventid', $value2)->where('eventregidforward', $value)->where('deleted_at', NULL)->count() == 1)
        {
            return true;
        }
        else { return false; }
    }

    public static function getGroupMemberForwardDuplicate($value, $value2)
    {
        if (DB::table('Event_m_Registration')->where('eventid', $value2)->where('memberid', $value)->where('deleted_at', NULL)->count() == 1)
        {
            return true;
        }
        else { return false; }
    }

    public static function putNullGroupCode($value)
    {
        DB::table('Event_m_Registration')
            ->where('eventid', $value)
            ->where('groupcode', '')
            ->update(array('groupcode' => NULL));

        return true;
    }

    public static function getid($value)
    {
        $mid = DB::table('Event_m_Registration')->where('uniquecode', $value)->pluck('id');
        return $mid;
    }

    public static function getcdregid($value, $value2)
    {
        $mid = DB::table('Event_m_Registration')->where('eventid', $value)
            ->where('memberid', $value2)->where('deleted_at', NULL)->pluck('id');
        return $mid;
    }

    public static function getregidbynric($value, $value2)
    {
        try
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('nrichash', md5($value2))->where('deleted_at', NULL)->pluck('id');
            if($mid == "") { $mid = 0; }
            return $mid;
        } catch(\Exception $e) { $mid = 0; }

    }

    public static function getattendanceventid($value)
    {
        $mid = DB::table('Attendance_m_Attendance')->where('uniquecode', $value)->pluck('eventid');
        return $mid;
    }

    public static function getmemberid($value)
    {
        $mid = DB::table('Event_m_Registration')->where('uniquecode', $value)->pluck('memberid');
        return $mid;
    }

    public static function getmembernameAttendance($value)
    {
        $evid =  DB::table('Card_m_CardDetail')->where('id', $value)->pluck('eventdetailid');
        $mid = DB::table('Event_m_Registration')->where('id', $evid)->pluck('name');
        return $mid;
    }

    public static function getSecurityPass($value, $value1)
    {
        $cardid = DB::table('Card_m_Card')->where('cardno', $value)->pluck('name');
        if ($cardid == '')
        {
            $mid = 0;
        }
        else
        {
            $mid = DB::table('Event_m_Registration')->where('cardno', $cardid)->where('eventid', $value1)->where('deleted_at', NULL)->pluck('id');
        }
        return $mid;
    }

    public function scopeGroupMemberMedicalRemarksByIndividual($query, $value)
    {
        if ($value == 0) { return $query->where('memberid', '16436'); } //New Friend thats not in database
        else { return $query->where('memberid', $value)->where('drugallergy', '!=', ''); }
    }

    public function scopeGroupMemberAllergyByIndividual($query, $value)
    {
        if ($value == 0) { return $query->where('memberid', '16436'); } //New Friend thats not in database
        else { return $query->where('memberid', $value)->where('drugallergy', '!=', ''); }
    }

    public function scopeMemberParticipationInEvent($query, $value)
    {
        if ($value == 0) { return $query->where('memberid', '16436'); } //New Friend thats not in database
        else { return $query->where('memberid', $value); }
    }

    public function scopeGroupEventListing($query, $value)
    {
        return $query->where('ssagroup', $value)->groupBy('ssagroup');
    }

    public static function getLPEventcheck1Value($value, $value2)
    {
        if ($value2 == 'District')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'))->selectRaw('sum(check1) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Chapter')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->selectRaw('sum(check1) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Zone')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('zone', Session::get('gakkaiuserzone'))->selectRaw('sum(check1) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Region')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('rhq', Session::get('gakkaiuserrhq'))->selectRaw('sum(check1) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'SHQ')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->selectRaw('sum(check1) as value')->pluck('value');
            return $mid;
        }
    }

    public static function getLPEventcheck2Value($value, $value2)
    {
        if ($value2 == 'District')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'))->selectRaw('sum(check2) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Chapter')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->selectRaw('sum(check2) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Zone')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('zone', Session::get('gakkaiuserzone'))->selectRaw('sum(check2) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Region')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('rhq', Session::get('gakkaiuserrhq'))->selectRaw('sum(check2) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'SHQ')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->selectRaw('sum(check2) as value')->pluck('value');
            return $mid;
        }
    }

    public static function getLPEventcheck3Value($value, $value2)
    {
        if ($value2 == 'District')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'))->selectRaw('sum(check3) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Chapter')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('chapter', Session::get('gakkaiuserchapter'))->selectRaw('sum(check3) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Zone')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('zone', Session::get('gakkaiuserzone'))->selectRaw('sum(check3) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'Region')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('rhq', Session::get('gakkaiuserrhq'))->selectRaw('sum(check3) as value')->pluck('value');
            return $mid;
        }
        else if ($value2 == 'SHQ')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->selectRaw('sum(check3) as value')->pluck('value');
            return $mid;
        }
    }

    // RSVP for Events
    public static function getRSVPEventTypeProcessing($value, $value2)
    {
        if ($value2 == 'District')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing"')->pluck('Processing');
            return $mid;
        }
        else if ($value2 == 'Chapter')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('chapter', Session::get('gakkaiuserchapter'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing"')->pluck('Processing');
            return $mid;
        }
        else if ($value2 == 'Zone')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('zone', Session::get('gakkaiuserzone'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing"')->pluck('Processing');
            return $mid;
        }
        else if ($value2 == 'Region')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('rhq', Session::get('gakkaiuserrhq'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing"')->pluck('Processing');
            return $mid;
        }
        else if ($value2 == 'SHQ')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing"')->pluck('Processing');
            return $mid;
        }
    }

    public static function getRSVPEventTypeAccepted($value, $value2)
    {
        if ($value2 == 'District')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('chapter', Session::get('gakkaiuserchapter'))->where('district', Session::get('gakkaiuserdistrict'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted"')->pluck('Accepted');
            return $mid;
        }
        else if ($value2 == 'Chapter')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('chapter', Session::get('gakkaiuserchapter'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted"')->pluck('Accepted');
            return $mid;
        }
        else if ($value2 == 'Zone')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('zone', Session::get('gakkaiuserzone'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted"')->pluck('Accepted');
            return $mid;
        }
        else if ($value2 == 'Region')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->where('rhq', Session::get('gakkaiuserrhq'))->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted"')->pluck('Accepted');
            return $mid;
        }
        else if ($value2 == 'SHQ')
        {
            $mid = DB::table('Event_m_Registration')->where('eventid', $value)->where('deleted_at', NULL)->selectRaw('SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted"')->pluck('Accepted');
            return $mid;
        }
    }

    public function scopeRSVPShowRHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, costume9 as "show", SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing", SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted", SUM(CASE WHEN Event_m_Registration.status IN ("Processing", "Accepted") THEN 1 ELSE 0 END) as "total"'))->groupBy('rhq', 'costume9')->orderby('rhq', 'costume9');
    }

    public function scopeRSVPShowZoneStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, costume9 as "show", SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing", SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted", SUM(CASE WHEN Event_m_Registration.status IN ("Processing", "Accepted") THEN 1 ELSE 0 END) as "total"'))->groupBy('rhq', 'zone', 'costume9')->orderby('rhq', 'zone', 'costume9');
    }

    public function scopeRSVPShowChapterStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, costume9 as "show", SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing", SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted", SUM(CASE WHEN Event_m_Registration.status IN ("Processing", "Accepted") THEN 1 ELSE 0 END) as "total"'))->groupBy('rhq', 'zone', 'chapter', 'costume9')->orderby('rhq', 'zone', 'chapter', 'costume9');
    }

    public function scopeRSVPShowDistrictStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, district, costume9 as "show", SUM(CASE WHEN Event_m_Registration.status IN ("Processing") THEN 1 ELSE 0 END) as "Processing", SUM(CASE WHEN Event_m_Registration.status IN ("Accepted") THEN 1 ELSE 0 END) as "Accepted", SUM(CASE WHEN Event_m_Registration.status IN ("Processing", "Accepted") THEN 1 ELSE 0 END) as "total"'))->groupBy('rhq', 'zone', 'chapter', 'district', 'costume9')->orderby('rhq', 'zone', 'chapter', 'district', 'costume9');
    }

    // Special Events
    public function scopeSpecialRHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, SUM(check1) as "Tried", SUM(check2) as "Met", SUM(check3) as "Attending"'))->groupBy('rhq')->orderby('rhq');
    }

    public function scopeSpecialZoneStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, SUM(check1) as "Tried", SUM(check2) as "Met", SUM(check3) as "Attending"'))->groupBy('rhq', 'zone')->orderby('rhq', 'zone');
    }

    public function scopeSpecialChapterStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, SUM(check1) as "Tried", SUM(check2) as "Met", SUM(check3) as "Attending"'))->groupBy('rhq', 'zone', 'chapter')->orderby('rhq', 'zone', 'chapter');
    }

    public function scopeSpecialDistrictStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, district, SUM(check1) as "Tried", SUM(check2) as "Met", SUM(check3) as "Attending"'))->groupBy('rhq', 'zone', 'chapter', 'district')->orderby('rhq', 'zone', 'chapter', 'district');
    }

    public function scopeRoleDivisionSHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('role, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq', 'zone', 'chapter')->orderby('rhq', 'zone', 'chapter');
    }

    public function scopeRoleDivisionRHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, role, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq')->orderby('rhq');
    }

    public function scopeRoleDivisionZoneStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, role, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq', 'zone')->orderby('rhq', 'zone');
    }

    public function scopeRoleDivisionChapterStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, role, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq', 'zone', 'chapter')->orderby('rhq', 'zone', 'chapter');
    }

    public function scopeRoleDivisionDistrictStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, district, role, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq', 'zone', 'chapter', 'district')->orderby('rhq', 'zone', 'chapter', 'district');
    }

    public function scopeStatusDivisionSHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('status, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('rhq', 'zone', 'chapter')->orderby('rhq', 'zone', 'chapter');
    }

    public function scopeStatusDivisionRHQStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, status, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('status', 'rhq')->orderby('rhq');
    }

    public function scopeStatusDivisionZoneStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, status, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('status', 'rhq', 'zone')->orderby('rhq', 'zone');
    }

    public function scopeStatusDivisionChapterStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, status, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('status', 'rhq', 'zone', 'chapter')->orderby('rhq', 'zone', 'chapter');
    }

    public function scopeStatusDivisionDistrictStats($query, $value)
    {
        return $query->where('eventid', $value)->Role()->select(DB::raw('rhq, zone, chapter, district, status, SUM(CASE WHEN division IN ("MD") THEN 1 ELSE 0 End) as "MD", SUM(CASE WHEN division IN ("WD") THEN 1 ELSE 0 End) as "WD", SUM(CASE WHEN division IN ("YM") THEN 1 ELSE 0 End) as "YMD", SUM(CASE WHEN division IN ("YW") THEN 1 ELSE 0 End) as "YWD", SUM(CASE WHEN division IN ("PD") THEN 1 ELSE 0 End) as "PD", SUM(CASE WHEN division IN ("YC") THEN 1 ELSE 0 End) as "YC", SUM(CASE WHEN division NOT IN ("MD", "WD", "YM", "YW", "PD", "YC") THEN 1 ELSE 0 End) as "Others", SUM(CASE WHEN division NOT IN (":") THEN 1 ELSE 0 End) as "Total"'))->groupBy('status', 'rhq', 'zone', 'chapter', 'district')->orderby('rhq', 'zone', 'chapter', 'district');
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
                    if ($field == "nric" or $field == 'tel' or $field == 'mobile' or $field == 'email'  or $field == 'address'
                        or $field == 'buildingname'  or $field == 'unitno' or $field == 'postalcode'
                        or $field == 'emergencytel' or $field == 'emergencymobile' or $field == 'Introducermobile')
                    { }
                    else
                    {
                        $olddata = $record->getOriginal($field);
                        if ($olddata != $newdata)
                        {
                            /*try
                            {
                                if (Session::get('gakkaiuserboe') == true)
                                {
                                    LogsfLogs::postLogs('Update', 34, $record->id, ' Name: ' . Session::get('gakkaiusername') . ' RHQ: ' . Session::get('gakkaiuserrhq') . ' Zone: ' . Session::get('gakkaiuserzone') . ' Chapter: ' . Session::get('gakkaiuserchapter') . ' District: ' . Session::get('gakkaiuserdistrict') . ' Division: ' . Session::get('gakkaiuserdivision') . ' Position: ' . Session::get('gakkaiuserposition') . ' - Event Detail - Participant Detail - ' . $field . ' - From: ' .  $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                                }
                                else
                                {
                                    LogsfLogs::postLogs('Update', 28, $record->id, ' - Event Detail - Participant Detail - ' . $field . ' - From: ' .  $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                                }
                            }
                            catch(\Exception $e)
                            {
                                LogsfLogs::postLogs('Update', 28, $record->id, ' - Event Detail - Participant Detail - ' . $field . ' - From: ' .  $olddata . ' To: ' . $newdata, $olddata, $newdata, 'Success');
                            }*/
                        }
                    }
                }
                return true;
            }
            catch(\Exception $e)
            {
                //LogsfLogs::postLogs('Update', 28, $record->id, ' - Event Detail - Participant Detail  - ' . $field . ' - ' . $e, $olddata, $newdata, 'Failed');
            }
        });
    }

    // To delete after youth summit
    public static function getEventYouthSummitParticipantNoOfTicket($value)
    {
        if (DB::table('Event_m_Registration')->where('eventid', 139)->where('eventregidforward', $value)->where('deleted_at', NULL)->count() >= 2)
        {
            return true;
        }
        else { return false; }
    }

    public static function getEventYouthSummitYonshaNoOfTicket($value)
    {
        if (DB::table('Event_m_Registration')->where('eventid', 139)->where('introducermemberid', $value)->where('deleted_at', NULL)->count() >= 2)
        {
            return true;
        }
        else { return false; }
    }
}
