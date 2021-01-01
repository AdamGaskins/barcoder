<?php


namespace AdamGaskins\Barcoder\ProvidersAbstract;


use AdamGaskins\Barcoder\BarcoderProvider;
use AdamGaskins\Barcoder\KreativeKorp\Barcode;

abstract class KreativeKorpProvider extends BarcoderProvider
{
    protected string $symbology;

    protected string $backgroundColor = '#00000000';
    protected int $scaleFactor = 10;

    public function toSvg(): string
    {
        return (new Barcode)->render_svg($this->symbology, $this->data, $this->getOptions());
    }

    public function toPng(): string
    {
        $image = (new Barcode)->render_image($this->symbology, $this->data, $this->getOptions());
        ob_start();
        imagepng($image);
        return ob_get_clean();
    }

    protected function getOptions(): array
    {
        return [
            'p' => 0,
            'wq' => 0,
            'sf' => $this->scaleFactor,
            'bc' => $this->backgroundColor
        ];
    }
}
