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

    public function details(Request $request, $id)
    {
        try {
            $event = Event::with(['eventType', 'participants'])->where(['uniquecode' => $id])->first();

            return response()->json([
                'event' => $event
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
