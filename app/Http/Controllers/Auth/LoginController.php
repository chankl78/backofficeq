<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\LogsmLogs;
use Jenssegers\Agent\Agent;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request)
    {
        $agent = new Agent();

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            $logmessagelogin = '[Login] - User Login - ' . Auth::user()->name . ' ' . Auth::user()->uniquecode;
            LogsmLogs::storelogs(Str::uuid(), Auth::user()->id, 'Login', 'User', 'Users\Login', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $logmessagelogin, NULL, NULL, $agent->device(), $agent->platform(), $agent->version($agent->platform()), $agent->browser(), $agent->version($agent->browser()), \Request::getClientIp(true), session()->getId(), "Success");
            Log::info($logmessagelogin . ' - ' . $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->version($agent->platform()) . ' - ' . $agent->browser() . ' - ' . $agent->version($agent->browser()));
            return response('Login Successful', 200);
        } else {
            $logmessagelogin = '[Login] - User Login - ' . $request['username'] . ' Failed to login.';
            LogsmLogs::storelogs(Str::uuid(), 0, 'Login', 'User', 'Users\Login', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, $logmessagelogin, NULL, NULL, $agent->device(), $agent->platform(), $agent->version($agent->platform()), $agent->browser(), $agent->version($agent->browser()), \Request::getClientIp(true), session()->getId(), "Failed");
            Log::warning($logmessagelogin . ' - ' . $agent->device() . ' - ' . $agent->platform() . ' - ' . $agent->version($agent->platform()) . ' - ' . $agent->browser() . ' - ' . $agent->version($agent->browser()));
            return response('Login Failed', 500);
        }
    }
}
