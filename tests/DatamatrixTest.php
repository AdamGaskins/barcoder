<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Providers\Datamatrix;
use AdamGaskins\Barcoder\Providers\QRCode;
use AdamGaskins\Barcoder\Tests\SnapshotDrivers\SvgDriver;
use Spatie\Snapshots\MatchesSnapshots;

class DatamatrixTest extends TestCase
{
    /** @test */
    public function it_generates_svg_barcodes()
    {
        $this->assertMatchesSvgSnapshot(\Barcoder::datamatrix('abcd')->toSvg());
    }

    /** @test */
    public function it_generates_png_barcodes()
    {
        $this->assertMatchesPngSnapshot(\Barcoder::datamatrix('This is a test!')->toPng());
    }
}
