<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class Code128 extends KreativeKorpProvider
{
    public $identifier = 'code128';

    protected string $symbology = 'code128';
}
