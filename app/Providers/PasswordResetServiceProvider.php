<?php
namespace App\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Services\PasswordBrokerManager;

class PasswordResetServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->registerPasswordBroker();
    }

    protected function registerPasswordBroker()
    {
        $this->app->singleton('auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('auth.password.broker', function ($app) {
            return $app->make('auth.password')->broker();
        });
    }

    public function provides()
    {
        return ['auth.password', 'auth.password.broker'];
    }
}
