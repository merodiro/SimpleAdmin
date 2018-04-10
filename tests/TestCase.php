<?php

namespace Merodiro\SimpleRoles;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Merodiro\SimpleRoles\SimpleRolesServiceProvider;

abstract class TestCase extends AbstractPackageTestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/database/factories');


        \Route::middleware('role:admin')->any('/_admin', function () {
            return 'OK';
        });

        \Route::middleware('role:manger')->any('/_manger', function () {
            return 'OK';
        });
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app['config']->set('simple_roles.roles', [
            'admin' => 1,
            'manger' => 2
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            SimpleRolesServiceProvider::class
        ];
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Http\Kernel', \Merodiro\SimpleRoles\Http\Kernel::class);
    }
}
