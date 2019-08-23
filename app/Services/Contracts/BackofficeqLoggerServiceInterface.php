<?php

namespace App\Services\Contracts;


use App\Models\LogsmLogs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

abstract class BackofficeqLoggerServiceInterface
{
    protected $agent;
    protected $userId;
    protected $logType = '';
    protected $resourceId = '';
    protected $resourceCode = '';
    protected $eventId = 0;
    protected $eventDetailId = 0;
    protected $groupId = 0;
    protected $groupDetailId = 0;
    protected $attendanceId = 0;
    protected $attendanceDetailId = 0;
    protected $campaignId = 0;
    protected $campaignDetailId = 0;
    protected $memberId = 0;
    protected $vehicleId = 0;
    protected $vehicleDetailId = 0;
    protected $from = null;
    protected $to = null;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    abstract public function info(string $message, string $description = '', string $status = 'Success');

    abstract public function warning(string $message, string $description = '', string $status = 'Warning');

    abstract public function error(string $message, string $description = '', string $status = 'Error');

    protected function getAgentMessages(string $message)
    {
        $log = [
            $message,
            $this->agent->device(),
            $this->agent->platform(),
            $this->agent->version($this->agent->platform()),
            $this->agent->browser(),
            $this->agent->version($this->agent->browser()),
        ];

        return implode(' - ', $log);
    }

    protected function storeDbLog(string $description = '', string $status = '')
    {
        LogsmLogs::storelogs(
            Str::uuid(),
            (Auth::user() ? Auth::user()->id : 0),
            $this->logType,
            $this->resourceId,
            $this->resourceCode,
            $this->eventId,
            $this->eventDetailId,
            $this->groupId,
            $this->groupDetailId,
            $this->attendanceId,
            $this->attendanceDetailId,
            $this->campaignId,
            $this->campaignDetailId,
            $this->memberId,
            $this->vehicleId,
            $this->vehicleDetailId,
            $description,
            $this->from,
            $this->to,
            $this->agent->device(),
            $this->agent->platform(),
            $this->agent->version($this->agent->platform()),
            $this->agent->browser(),
            $this->agent->version($this->agent->browser()),
            \Request::getClientIp(true),
            session()->getId(),
            $status
        );
    }
}
