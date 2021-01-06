<?php


namespace AdamGaskins\Barcoder\Providers;

use AdamGaskins\Barcoder\ProviderAbstract\KreativeKorpLabelledProvider;

class UPCA extends KreativeKorpLabelledProvider
{
    public string $identifier = 'upca';

    protected string $symbology = 'upc-a';

    protected function validateData($data): string
    {
        if (strlen($data) === 11) {
            return $data . '*';
        }

        return $data;
    }
}
