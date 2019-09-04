<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackofficeqLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            '\App\Services\Contracts\BackofficeqLoggerServiceInterface',
            '\App\Services\BackofficeqLoggerService'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
