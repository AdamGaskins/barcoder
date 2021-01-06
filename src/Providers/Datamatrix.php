<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class Datamatrix extends KreativeKorpProvider
{
    public string $identifier = 'datamatrix';

    public string $symbology = 'dmtx';
}
