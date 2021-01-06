<?php


namespace AdamGaskins\Barcoder\ProvidersAbstract;

use AdamGaskins\Barcoder\BarcoderProvider;
use AdamGaskins\Barcoder\KreativeKorp\Barcode;

abstract class KreativeKorpProvider extends BarcoderProvider
{
    protected string $symbology;

    protected ?float $scaleX = 10;
    protected ?float $scaleY = 10;

    public function toSvg(): string
    {
        return (new Barcode)->render_svg($this->symbology, $this->data, $this->getOptions());
    }

    protected function getOptions(): array
    {
        return [
            'p' => 0,
            'wq' => 0,
            'bc' => $this->backgroundColor,
            'cm' => $this->color,
            'sx' => $this->scaleX,
            'sy' => $this->scaleY
        ];
    }
}
