<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\BackofficeqLoggerService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

    protected $logger;

    public function __construct(BackofficeqLoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $user = new User();
            $user->name = $request->email;
            $user->email = $request->email;
            $user->username = $request->email;
            $user->password = Hash::make($request->password);
            $user->uniquecode = Str::uuid();
            $user->save();
            $user->assignRole('user');

            event(new Registered($user));

            // $this->guard()->login($user);
            // $token = $this->guard('api')->attempt($request->only('email', 'password'));

            $this->logger->info('[Registration] Successfully created a new account.');

            return response()->json([
                'status' => 200,
                'message' => 'Successfully created a new account. Please check your email and activate your account.',
            ], 200);
        } catch (\Exception $exception) {
            $this->logger->warning('[Registration] Unable to register user.');

            return response()->json([
                'status' => 401,
                'message' => 'Unable to register user.'
            ], 401);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            $this->logger->info('[Login] User logged in.');

            return response()->json([
                'status' => 'success',
                'user' => auth()->user()
            ], 200)->header('Authorization', $token);
        }

        $this->logger->warning('[Login] Bad credentials.');

        return response()->json([
            'message' => 'Bad credentials',
        ], 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        $this->logger->info('[Logout] User logged out.');

        return response()->json([
            'status' => 'success',
            'message' => 'Logged out Successfully.',
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json([
                    'status' => 'successs'
                ], 200)
                ->header('Authorization', $token);
        }

        return response()->json([
            'message' => 'refresh_token_error'
        ], 401);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
