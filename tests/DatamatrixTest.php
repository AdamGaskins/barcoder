<?php

namespace AdamGaskins\Barcoder\Tests;

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
