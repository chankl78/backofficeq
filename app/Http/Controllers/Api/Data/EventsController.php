<?php

namespace App\Http\Controllers\Api\Data;

//use App\Models\Event\Event;
use App\Models\Event_m_Event;
use App\Models\Event_m_Registration;
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

    public function details(Request $request, $id)
    {
        try {
            $event = Event_m_Event::with('registrations', 'registrations.member')
                ->where('uniquecode', $id)
                ->first();
            return response()->json([
                'event' => $event,
                'participants' => []
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
