<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Tests\SnapshotDrivers\PngDriver;
use AdamGaskins\Barcoder\Tests\SnapshotDrivers\SvgDriver;
use PHPUnit\Framework\TestCase as PhpUnit;
use Spatie\Snapshots\MatchesSnapshots;

class TestCase extends PhpUnit
{
    use MatchesSnapshots;

    public function setUp(): void
    {
        parent::setUp();
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
