<?php
namespace App\Services;

use App\Models\AccessmUser;
use Closure;
use Illuminate\Auth\Passwords\PasswordBroker as BasePasswordBroker;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Arr;
use UnexpectedValueException;

class PasswordBroker extends BasePasswordBroker
{
    public function reset(array $credentials, Closure $callback)
    {
        $user = $this->validateReset($credentials);

        if (!$user instanceof CanResetPasswordContract) {
            return $user;
        }

        $password = $credentials['password'];
        $callback($user, $password);
        $this->tokens->delete($user);

        return static::PASSWORD_RESET;
    }

    public function getUser(array $credentials)
    {
        $credentials = Arr::except($credentials, ['token']);
        if (isset($credentials['email'])) {
            $credentials['username'] = $credentials['email'];
            unset($credentials['email']);
        }

        $user = $this->users->retrieveByCredentials($credentials);

        if ($user && ! $user instanceof CanResetPasswordContract) {
            throw new UnexpectedValueException('User must implement CanResetPassword interface.');
        }

        return $user;
    }
}
