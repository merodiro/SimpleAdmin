<?php

namespace Merodiro\SimpleAdmin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class SimpleAdminServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/config/simple_admin.php' => config_path('simple_admin.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/simple_admin.php',
            'simple_admin'
        );

        Blade::if('admin', function () {
            return optional(Auth::user())->admin === 1;
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
