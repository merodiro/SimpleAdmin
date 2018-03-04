<?php

namespace Merodiro\SimpleAdmin;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use Merodiro\SimpleAdmin\SimpleAdminServiceProvider;

abstract class TestCase extends AbstractPackageTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->loadLaravelMigrations('sqlite');
        // $this->artisan('migrate', ['--database' => 'sqlite']);

        $this->withFactories(__DIR__.'/database/factories');

        \Route::middleware('admin')->any('/_test', function () {
            return 'OK';
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            SimpleAdminServiceProvider::class
        ];
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton('Illuminate\Contracts\Http\Kernel', \Merodiro\SimpleAdmin\Http\Kernel::class);
    }
}
