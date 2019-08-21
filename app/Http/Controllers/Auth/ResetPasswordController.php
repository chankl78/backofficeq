<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*public function sendResetPassEmail(Request $request)
    {
        $response = $this->passwords->sendResetLink($request->only('email'), function($m) {
            $m->subject($this->getEmailSubject());
        });

        switch ($response) {
            case PasswordBroker::RESET_LINK_SENT:
                return response()->json([
                    'error' => false,
                    'message' => 'A password link has been sent to your email address',
                ], 200);
                break;
            case PasswordBroker::INVALID_USER:
            default:
                return response()->json([
                    'error' => true,
                    'message' => 'User not registered',
                ], 402);
        }
    }*/

    protected function rules()
    {
        return ['email' => 'required|email'];
    }

    protected function sendResetResponse($response)
    {
        return response()->json([
            'error' => false,
            'message' => trans($response),
        ], 200);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json([
            'error' => true,
            'message' => trans($response),
        ], 402);
    }
}
