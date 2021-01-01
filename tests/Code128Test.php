<?php

namespace AdamGaskins\Barcoder\Tests;

use Spatie\Snapshots\MatchesSnapshots;

class Code128Test extends TestCase
{
    use MatchesSnapshots;

    /** @test */
    public function it_generates_svg_barcodes()
    {
        $this->assertMatchesSvgSnapshot(\Barcoder::code128('abcd1234')->toSvg());
    }

    /** @test */
    public function it_generates_png_barcodes()
    {
        $this->assertMatchesPngSnapshot(\Barcoder::code128('abcd1234')->toPng());
    }
}
