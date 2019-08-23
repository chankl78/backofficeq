<?php

namespace App\Services;

use App\Services\Contracts\BackofficeqLoggerServiceInterface;
use Illuminate\Support\Facades\Log;

class BackofficeqLoggerService extends BackofficeqLoggerServiceInterface
{
    public function info(string $message, string $description = '', string $status = 'Success')
    {
        Log::info($this->getAgentMessages($message));
        $this->storeDbLog($description, $status);
    }

    public function warning(string $message, string $description = '', string $status = 'Warning')
    {
        Log::warning($this->getAgentMessages($message));
        $this->storeDbLog($description, $status);
    }

    public function error(string $message, string $description = '', string $status = 'Error')
    {
        Log::error($this->getAgentMessages($message));
        $this->storeDbLog($description, $status);
    }

}
