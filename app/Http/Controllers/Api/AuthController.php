<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use SendsPasswordResetEmails;

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

            $userId = auth('api')->user()->id;
            $user = User::with(['roles'])->where(['id' => $userId])->first();
            $permissions = $user->getPermissionsViaRoles()->pluck('name');

            return response()->json([
                'status' => 'success',
                'user' => $user,
                'roles' => $user->roles()->pluck('name'),
                'permissions' => $permissions,
            ], 200)->header('Authorization', $token);
        } else {
            $user = User::where(['username' => $credentials['username']])->first();
            $userId = $user->id ? intval($user->id) : 0;
            $this->logger->warning('[Login] Bad credentials.', $userId);
        }

        return response()->json([
            'message' => 'Bad credentials',
        ], 401);
    }

    public function logout()
    {
        $userId = auth('api')->user()->id;

        $this->logger->info('[Logout] User logged out.', $userId);

        $this->guard()->logout();

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
