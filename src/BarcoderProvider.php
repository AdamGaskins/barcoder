<?php


namespace AdamGaskins\Barcoder;


abstract class BarcoderProvider
{
    public $identifier;

    protected $data;

    public function __construct(string $data = '')
    {
        $this->data = $data;
    }

    public abstract function toSvg(): string;
    public abstract function toPng(): string;
}
