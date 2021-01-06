<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpLabelledProvider;

class EAN13 extends KreativeKorpLabelledProvider
{
    public string $identifier = 'ean13';

    protected string $symbology = 'ean-13';
}
