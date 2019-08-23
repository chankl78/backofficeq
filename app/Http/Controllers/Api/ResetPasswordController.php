<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogsmLogs;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $password;

    public function __construct()
    {
        $this->middleware('guest');
        $this->password = str_random(10);
    }

    protected function rules()
    {
        return ['email' => 'required|email'];
    }

    public function reset(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'token' => $request->get('token'),
            'password' => $this->password,
            'password_confirmation' => $this->password,
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

    protected function sendResetResponse(Request $request, $response)
    {
        $agent = new Agent();
        $logmessage = '[Reset Password] Password reset successfully.';
        LogsmLogs::storelogs(Str::uuid(), 0, 'Reset', 'User', 'Users\ResetPassword', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ResetPassword', NULL, NULL, $agent->device(), $agent->platform(), $agent->version($agent->platform()), $agent->browser(), $agent->version($agent->browser()), \Request::getClientIp(true), session()->getId(), "Success");
        Log::info($logmessage . ' - ' . $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->version($agent->platform()) . ' - ' . $agent->browser() . ' - ' . $agent->version($agent->browser()));

        return response()->json([
            'error' => false,
            'message' => trans($response),
            'password' => $this->password,
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
