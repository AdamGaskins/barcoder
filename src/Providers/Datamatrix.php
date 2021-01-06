<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpProvider;

class Datamatrix extends KreativeKorpProvider
{
    public string $identifier = 'datamatrix';

    public string $symbology = 'dmtx';
}
