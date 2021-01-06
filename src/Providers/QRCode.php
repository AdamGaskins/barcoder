<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpProvider;

class QRCode extends KreativeKorpProvider
{
    public string $identifier = 'qrcode';

    protected string $symbology = 'qr';
}
