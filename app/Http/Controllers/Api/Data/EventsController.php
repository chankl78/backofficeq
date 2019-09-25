<?php

namespace App\Http\Controllers\Api\Data;

//use App\Models\Event\Event;
use App\Models\Event_m_Event;
use App\Models\Event_m_Registration;
use App\Models\EventzEventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        try {
            $records = Event_m_Event::all();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 200);
        }

        return response()->json([
            'records' => $records,
        ], 200);
    }

    public function update(Request $request, $id, $section)
    {
        switch ($section) {
            case 'info':
                $allowedFields = ['description', 'location', 'eventdate', 'eventtype', 'status'];
                $event = Event_m_Event::where('uniquecode', $id)->first();
                $event->update(collect($request->all())->filter(function ($item, $key) use ($allowedFields) {
                    return in_array($key, $allowedFields);
                })->toArray());
        }
    }

    public function participants(Request $request, $id)
    {
        try {
            $participants = Event_m_Registration::with('member')
                ->where('eventid', $id)
                ->get();
            return response()->json([
                'participants' => $participants
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function details(Request $request, $id)
    {
        try {
            $event = Event_m_Event::where('uniquecode', $id)->first();
            $eventTypes = EventzEventType::all();
            return response()->json([
                'event' => $event,
                'event_types' => $eventTypes,
                'participants' => []
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
