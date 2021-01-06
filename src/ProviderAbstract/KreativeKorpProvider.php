<?php


namespace AdamGaskins\Barcoder\ProviderAbstract;

use AdamGaskins\Barcoder\BarcoderProvider;
use AdamGaskins\Barcoder\KreativeKorp\Barcode;

abstract class KreativeKorpProvider extends BarcoderProvider
{
    protected string $symbology;

    protected ?float $scaleX = 1;
    protected ?float $scaleY = 1;

    public function toSvg(): string
    {
        return (new Barcode)->render_svg($this->symbology, $this->data, $this->getOptions());
    }

    protected function getOptions(): array
    {
        return [
            'p' => 0,
            'th' => 0,
            'wq' => 0,
            'bc' => $this->backgroundColor,
            'cm' => $this->color,
            'sx' => $this->scaleX,
            'sy' => $this->scaleY,
        ];
    }
}
