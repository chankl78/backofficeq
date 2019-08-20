<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogsmLogs extends Model
{
    protected $table = 'Logs_m_logs';
    protected $fillable = ['uniquecode' ,'userid', 'logtype', 'resourceid', 'resourcecode', 'eventid', 'eventdetailid', 'groupid', 'groupdetailid', 'attendanceid', 'attendancedetailid', 'campaignid', 'campaigndetailid', 'memberid', 'vechicleid', 'vechicledetailid', 'description', 'from', 'to', 'device', 'platform', 'platformversion', 'browser', 'browserversion', 'ipaddress', 'session', 'status'];

    public static function storeLogs( $uniquecode, $userid, $logtype, $resourceid, $resourcecode, $eventid, $eventdetailid, $groupid, $groupiddetail, $attendanceid, $attendancedetailid, $campaignid, $campaigndetailid, $memberid, $vehicleid, $vehicledetailid, $description, $from, $to, $device, $platform, $platformversion, $browser, $browserversion, $ipaddress, $session, $status)
    {
        LogsmLogs::create(array(
            'uniquecode' => $uniquecode,
            'userid' => $userid,
            'logtype' => $logtype,
            'resourceid' => $resourceid,
            'resourcecode' => $resourcecode,
            'eventid' => $eventid,
            'eventdetailid' => $eventdetailid,
            'groupid' => $groupid,
            'groupdetailid' => $groupiddetail,
            'attendanceid' => $attendanceid,
            'attendancedetailid' => $attendancedetailid,
            'campaignid' => $campaignid,
            'campaigndetailid' => $campaigndetailid,
            'memberid' => $memberid,
            'vehicleid' => $vehicleid,
            'vehicledetailid' => $vehicledetailid,
            'description' => $description,
            'from' => $from,
            'to' => $to,
            'device' => $device,
            'platform' => $platform,
            'platformversion' => $platformversion,
            'browser' => $browser,
            'browserversion' => $browserversion,
            'ipaddress' => $ipaddress,
            'session' => $session,
            'status' => $status
        ));
    }
}
