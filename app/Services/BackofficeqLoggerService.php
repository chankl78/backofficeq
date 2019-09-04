<?php

namespace App\Services;

use App\Services\Contracts\BackofficeqLoggerServiceInterface;
use Illuminate\Support\Facades\Log;

class BackofficeqLoggerService extends BackofficeqLoggerServiceInterface
{
    public function info(string $message, $userId = 0, string $status = 'Success')
    {
        Log::info($this->getAgentMessages($message));
        $this->storeDbLog($this->getAgentMessages($message), $userId, $status);
    }

    public function warning(string $message, $userId = 0, string $status = 'Warning')
    {
        Log::warning($this->getAgentMessages($message));
        $this->storeDbLog($this->getAgentMessages($message), $userId, $status);
    }

    public function error(string $message, $userId = 0, string $status = 'Error')
    {
        Log::error($this->getAgentMessages($message));
        $this->storeDbLog($this->getAgentMessages($message), $userId, $status);
    }

}
