<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Facades\Barcoder;
use AdamGaskins\Barcoder\BarcoderServiceProvider;
use AdamGaskins\Barcoder\Tests\SnapshotDrivers\PngDriver;
use AdamGaskins\Barcoder\Tests\SnapshotDrivers\SvgDriver;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Snapshots\MatchesSnapshots;

class TestCase extends Orchestra
{
    use MatchesSnapshots;

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            BarcoderServiceProvider::class,
        ];
    }

    public function getPackageAliases($app)
    {
        return [
            'Barcoder' => Barcoder::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        /*
        include_once __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        (new \CreatePackageTable())->up();
        */
    }

    protected function assertMatchesSvgSnapshot(string $actual)
    {
        $this->assertMatchesSnapshot($actual, new SvgDriver());
    }

    protected function assertMatchesPngSnapshot(string $actual)
    {
        $this->assertMatchesSnapshot($actual, new PngDriver());
    }
}
