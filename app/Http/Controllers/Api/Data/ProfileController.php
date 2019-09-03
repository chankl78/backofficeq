<?php

namespace App\Http\Controllers\Api\Data;

use App\Models\LogsmLogs;
use App\Models\User;
use App\Services\BackofficeqLoggerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function details(Request $request)
    {
        if ($_user = auth('api')->user()) {
            $user = User::where(['id' => $_user->id])->first();
            if ($user) {
                return response()->json([
                    'user' => $user,
                ]);
            }
        }
        return response()->json([
            'error' => 'User not found...',
        ], 500);
    }

    public function update(Request $request)
    {
        if ($_user = auth('api')->user()) {
            try {
                $user = User::where(['id' => $_user->id])->first();
                $data = $request->only(['name', 'email', 'phone', 'mobile']);
                $user->update($data);

                $this->logger->info('[Profile update] Profile updated successfully.', $_user->id);

                return response()->json([
                    'message' => 'Profile updated',
                    'user' => $user,
                ]);
            } catch (\Exception $e) {
                $this->logger->warning('[Profile update] Error on profile update.', $_user->id);
                return response()->json([
                    'error' => 'Error on profile update',
                ], 500);
            }
        }
        return response()->json([
            'error' => 'Bad request...',
        ], 500);
    }

    public function activities(Request $request)
    {
        if ($_user = auth('api')->user()) {
            $logs = LogsmLogs::where(['userid' => $_user->id])
                ->orderBy('created_at', 'DESC')
                ->skip($request->get('p', 0) * 5)
                ->take(5)
                ->get();
            if ($logs) {
                return response()->json([
                    'logs' => $logs,
                    'count' => LogsmLogs::where(['userid' => $_user->id])->count(),
                ]);
            }
        }
        return response()->json([
            'error' => 'User not found...',
        ], 500);
    }
}
