<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\BackofficeqLoggerService;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = '/';

    public function __construct(BackofficeqLoggerService $logger)
    {
        parent::__construct($logger);
        $this->middleware('signed')->only('verify');
    }

    public function verify(Request $request)
    {
        $id = $request->route('id');
        if ($id && $request->hasValidSignature()) {
            $user = User::where('id', $id)->first();
            $user->markEmailAsVerified();
            event(new Verified($user));
            return response()->json([
                'message' => 'Email verified!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Verification error',
            ], 401);
        }
    }

    public function resend(Request $request)
    {
        if (auth('api')->user()->hasVerifiedEmail()) {
            return response()->json([
                'error' => 'User already have verified email!'
            ], 422);
        }
        auth('api')->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'The notification email has been resubmitted'
        ]);
    }
}
