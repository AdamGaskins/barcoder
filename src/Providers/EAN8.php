<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpLabelledProvider;

class EAN8 extends KreativeKorpLabelledProvider
{
    public string $identifier = 'ean8';

    protected string $symbology = 'ean-8';
}
