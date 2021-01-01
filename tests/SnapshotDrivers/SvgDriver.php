<?php


namespace AdamGaskins\Barcoder\Tests\SnapshotDrivers;


use Spatie\Snapshots\Drivers\XmlDriver;

class SvgDriver extends XmlDriver
{
    public function extension(): string
    {
        return 'svg';
    }
}
