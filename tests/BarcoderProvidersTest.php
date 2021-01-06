<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Barcoder;
use AdamGaskins\Barcoder\Providers\Code128;
use AdamGaskins\Barcoder\Providers\Datamatrix;
use AdamGaskins\Barcoder\Providers\QRCode;

class BarcoderProvidersTest extends TestCase
{
    /** @test */
    public function it_doesnt_load_invalid_provider()
    {
        $this->expectException(\InvalidArgumentException::class);

        Barcoder::registerProvider(InvalidProvider::class);
    }

    /** @test */
    public function it_throws_exception_when_provider_doesnt_exist()
    {
        $this->expectException(\InvalidArgumentException::class);

        Barcoder::invalidProvider('abcd');
    }

    /**
     * @test
     * @dataProvider providers
     */
    public function it_loads_providers($providerClass, $identifier, $sampleText)
    {
        $this->assertInstanceOf($providerClass, Barcoder::{$identifier}($sampleText));
    }

    /**
     * @test
     * @dataProvider providers
     */
    public function it_generates_svgs($providerClass, $identifier, $sampleText)
    {
        $this->assertMatchesSvgSnapshot(Barcoder::{$identifier}($sampleText)->toSvg());
    }

    /**
     * @test
     * @dataProvider providers
     */
    public function it_generates_svgs_with_colors($providerClass, $identifier, $sampleText)
    {
        $this->assertMatchesSvgSnapshot(
            Barcoder::{$identifier}($sampleText)
                ->color('#f4a261')
                ->backgroundColor('#2a9d8f')
                ->toSvg()
        );
    }

    protected const ALPHANUMERIC = 'ABCxyz123';

    public function providers()
    {
        return [
            'qrcode' => [ QRCode::class, 'qrcode', self::ALPHANUMERIC ],
            'datamatrix' => [ Datamatrix::class, 'datamatrix', self::ALPHANUMERIC ],
            'code128' => [ Code128::class, 'code128', self::ALPHANUMERIC ],
        ];
    }
}

class InvalidProvider
{
}
