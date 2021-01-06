<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpLabelledProvider;

class Code128 extends KreativeKorpLabelledProvider
{
    public string $identifier = 'code128';

    protected string $symbology = 'code128';
}
