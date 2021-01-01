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

    abstract public function toSvg(): string;

    abstract public function toPng(): string;
}
