<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class EAN13 extends KreativeKorpProvider
{
    public string $identifier = 'ean13';

    protected string $symbology = 'ean-13';
}
