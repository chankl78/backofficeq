<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AccessmUser;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('signed')->only('verify');
    }

    public function verify(Request $request)
    {
        $id = $request->route('id');
        if ($id && $request->hasValidSignature()) {
            $user = AccessmUser::where('id', $id)->first();
            $user->markEmailAsVerified();
            event(new Verified($user));
            return response()->json([
                'message' => 'Email verified!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Email verified!',
            ], 401);
        }
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json('User already have verified email!', 422);
        }
        $request->user()->sendEmailVerificationNotification();

        return response()->json('The notification has been resubmitted');
    }
}
