<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Providers\Datamatrix;
use AdamGaskins\Barcoder\Providers\QRCode;

class BarcoderProvidersTest extends TestCase
{
    /** @test */
    public function it_loads_qr_code_provider()
    {
        $this->assertInstanceOf(QRCode::class, \Barcoder::qrcode('abcd'));
    }

    /** @test */
    public function it_loads_datamatrix_provider()
    {
        $this->assertInstanceOf(Datamatrix::class, \Barcoder::datamatrix('abcd'));
    }

    /** @test */
    public function it_doesnt_load_invalid_provider()
    {
        $this->expectException(\InvalidArgumentException::class);

        \Barcoder::registerProvider(InvalidProvider::class);
    }

    /** @test */
    public function it_throws_exception_when_provider_doesnt_exist()
    {
        $this->expectException(\InvalidArgumentException::class);

        \Barcoder::invalidProvider('abcd');
    }
}

class InvalidProvider
{

}
