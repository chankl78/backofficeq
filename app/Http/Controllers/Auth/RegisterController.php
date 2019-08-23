<?php

namespace App\Http\Controllers\Auth;

use App\Models\AccessmUser;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Access_m_User'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function register(Request $request)
    {
        $validator = $this->validator($request->all());
        $validatedData = $validator->validate();
        if ($validator->fails()) {
            return response()->json([
                'status' => '',
                'message' => $validator->errors()
            ], 401);
        }
        try {
            $validatedData['name'] = $validatedData['email'];
            $validatedData['username'] = $validatedData['email'];
            $validatedData['password'] = Hash::make(array_get($validatedData, 'password'));
            $validatedData['uniquecode'] = Str::uuid();
            $validatedData['roleid'] = env('LH_ROLEID');
            $validatedData['remember_token'] = Str::random(10);

            event(new Registered($user = $this->create($validatedData)));

            $this->guard()->login($user);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => '',
                'message' => 'Unable to register user.'
            ], 401);
        }

        return response()->json([
                'status' => 200,
                'message' => 'Successfully created a new account. Please check your email and activate your account.',
            ], 200);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return AccessmUser::create($data);
    }
}
