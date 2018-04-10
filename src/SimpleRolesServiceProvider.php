<?php

namespace Merodiro\SimpleRoles;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class SimpleRolesServiceProvider extends ServiceProvider
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
            __DIR__.'/config/simple_roles.php' => config_path('simple_roles.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->mergeConfigFrom(
            __DIR__.'/config/simple_roles.php',
            'simple_roles'
        );

        Blade::if('role', function ($role) {
            return optional(Auth::user())->hasRole($role);
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
