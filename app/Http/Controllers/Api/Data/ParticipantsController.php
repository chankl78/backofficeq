<?php

namespace App\Http\Controllers\Api\Data;

use App\Http\Controllers\Controller;
use App\Models\Event\Participant;
use App\Models\Members_m_SSA;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function details(Request $request, $id)
    {
        try {
            /*$participant = Participant::with([
                'member',
                'member.address',
                'member.orgInfo',
                'member.orgInfo.orgChart'
            ])*/
            $participant = Members_m_SSA::where(['uniquecode' => $id])->first();
            if ($participant) {
                return response()->json([
                    'participant' => $participant
                ], 200);
            } else {
                throw new \Exception('Participant not found');
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
