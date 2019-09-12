<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\Event\Event;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function index()
    {
        $events = Event::with('eventType')->orderBy('created_at', 'DESC')->get();

        return response()->json($events, 200);
    }
}
