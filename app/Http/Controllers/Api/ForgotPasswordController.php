<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\BackofficeqLoggerService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->middleware('guest');
        $this->logger = $logger;
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink(
            $request->only('username')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, ['username' => 'required|email']);
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        $this->logger->info('[Reset Password Link] Password reset link sent successfully.');

        return response()->json(['message' => trans($response)], 200);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        $this->logger->warning('[Reset Password Link] Failed.');

        return response()->json([
            'status' => 401,
            'message' => trans($response)
        ], 401);
    }
}
