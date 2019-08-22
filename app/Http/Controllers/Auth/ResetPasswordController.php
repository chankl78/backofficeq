<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccessmUser;
use App\Models\LogsmLogs;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Illuminate\Auth\Passwords\PasswordBroker as BasePasswordBroker;
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

    protected function rules()
    {
        return ['email' => 'required|email'];
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    public function reset(Request $request)
    {
        $newPassword = str_random(8);
        $data = [
            'email' => $request->get('email'),
            'token' => $request->get('token'),
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ];
        $request->validate($this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $data,
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($request, $response)
            : $this->sendResetFailedResponse($request, $response);
    }

    protected function sendResetResponse($response)
    {
        $agent = new Agent();
        $logmessage = '[Reset Password] Password reset successfully.';
        LogsmLogs::storelogs(Str::uuid(), 0, 'Reset', 'User', 'Users\ResetPassword', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ResetPassword', NULL, NULL, $agent->device(), $agent->platform(), $agent->version($agent->platform()), $agent->browser(), $agent->version($agent->browser()), \Request::getClientIp(true), session()->getId(), "Success");
        Log::info($logmessage . ' - ' . $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->version($agent->platform()) . ' - ' . $agent->browser() . ' - ' . $agent->version($agent->browser()));

        return response()->json([
            'error' => false,
            'message' => trans($response),
        ], 200);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        $agent = new Agent();
        $logmessage = '[Reset Password] Failed to reset password.';
        LogsmLogs::storelogs(Str::uuid(), 0, 'Reset', 'User', 'Users\ResetPassword', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $logmessage, NULL, NULL, $agent->device(), $agent->platform(), $agent->version($agent->platform()), $agent->browser(), $agent->version($agent->browser()), \Request::getClientIp(true), session()->getId(), "Failed");
        Log::warning($logmessage . ' - ' . $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->version($agent->platform()) . ' - ' . $agent->browser() . ' - ' . $agent->version($agent->browser()));

        return response()->json([
            'error' => true,
            'message' => trans($response),
        ], 402);
    }
}
