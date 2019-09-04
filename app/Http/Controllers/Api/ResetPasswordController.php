<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BackofficeqLoggerService;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $logger;
    protected $password;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->middleware('guest');
        $this->logger = $logger;
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
        $this->logger->info('[Reset Password] Password reset successfully.');

        return response()->json([
            'error' => false,
            'message' => trans($response),
            'password' => $this->password,
        ], 200);
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        $this->logger->warning('[Reset Password] Failed to reset password.');

        return response()->json([
            'error' => true,
            'message' => trans($response),
        ], 402);
    }
}
