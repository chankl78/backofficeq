<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::with('eventType')->orderBy('created_at', 'DESC')->get();

        return response()->json($events, 200);
    }

    public function details(Request $request, $id)
    {
        try {
            $event = Event::with([
                'eventType',
                'participants',
                'participants.member',
                'participants.member.orgInfo',
                'participants.member.orgInfo.orgChart'
            ])->where(['uniquecode' => $id])->first();
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
