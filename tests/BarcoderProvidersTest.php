<?php

namespace AdamGaskins\Barcoder\Tests;

use AdamGaskins\Barcoder\Barcoder;
use AdamGaskins\Barcoder\Providers\Code128;
use AdamGaskins\Barcoder\Providers\Datamatrix;
use AdamGaskins\Barcoder\Providers\EAN13;
use AdamGaskins\Barcoder\Providers\EAN8;
use AdamGaskins\Barcoder\Providers\QRCode;
use AdamGaskins\Barcoder\Providers\UPCA;
use AdamGaskins\Barcoder\Providers\UPCE;

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
     * @dataProvider barcodes
     */
    public function it_loads_providers($providerClass, $identifier, $sampleText)
    {
        $this->assertInstanceOf($providerClass, Barcoder::{$identifier}($sampleText));
    }

    /**
     * @test
     * @dataProvider barcodes
     */
    public function it_generates_svgs($providerClass, $identifier, $sampleText)
    {
        $this->assertMatchesSvgSnapshot(Barcoder::{$identifier}($sampleText)->toSvg());
    }

    /**
     * @test
     * @dataProvider barcodes
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

    /**
     * @test
     * @dataProvider barcodes2d
     */
    public function it_generates_linear_barcodes_without_label($providerClass, $identifier, $sampleText)
    {
        $this->assertMatchesSvgSnapshot(
            Barcoder::{$identifier}($sampleText)
                ->hideLabel()
                ->toSvg()
        );
    }

    protected const ASCII = 'ABCxyz123';
    protected const TWELVE_DIGIT = '12345678901*';
    protected const SIX_DIGIT = '12345*';

    public function barcodes()
    {
        return array_merge($this->barcodes2d(), [
            'qrcode' => [ QRCode::class, 'qrcode', self::ASCII ],
            'datamatrix' => [ Datamatrix::class, 'datamatrix', self::ASCII ],
        ]);
    }

    public function barcodes2d()
    {
        return [
            'upca' => [ UPCA::class, 'upca', '12345678901*' ],
            'upce' => [ UPCE::class, 'upce', '12345*' ],
            'ean8' => [ EAN8::class, 'ean8', '1234567*' ],
            'ean13' => [ EAN13::class, 'ean13', '123456789012*' ],
            'code128' => [ Code128::class, 'code128', self::ASCII ],
        ];
    }
}

class InvalidProvider
{
}
