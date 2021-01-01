<?php


namespace AdamGaskins\Barcoder\Tests\SnapshotDrivers;

use Spatie\Snapshots\Drivers\TextDriver;

class PngDriver extends TextDriver
{
    public function extension(): string
    {
        return 'png';
    }
}
