<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class EAN8 extends KreativeKorpProvider
{
    public string $identifier = 'ean8';

    protected string $symbology = 'ean-8';
}
