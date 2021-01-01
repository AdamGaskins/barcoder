<?php


namespace AdamGaskins\Barcoder\Providers;


use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class QRCode extends KreativeKorpProvider
{
    public $identifier = 'qrcode';

    protected string $symbology = 'qr';
}
