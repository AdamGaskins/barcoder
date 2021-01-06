<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProvidersAbstract\KreativeKorpProvider;

class UPCE extends KreativeKorpProvider
{
    public string $identifier = 'upce';

    protected string $symbology = 'upc-e';

    protected function validateData($data): string
    {
        if (strlen($data) === 5) {
            return $data . '*';
        }

        return $data;
    }
}
