<?php


namespace AdamGaskins\Barcoder;

abstract class BarcoderProvider
{
    public string $identifier;

    protected string $data;

    protected string $backgroundColor = '#00000000';
    protected string $color = '#000000';
    protected ?float $scaleX = 1;
    protected ?float $scaleY = 1;

    public function __construct(string $data = '')
    {
        $this->data = $this->validateData($data);
    }

    protected function validateData(string $data): string
    {
        return $data;
    }

    public function backgroundColor(string $backgroundColor): self
    {
        return $this->clone([ 'backgroundColor' => $backgroundColor ]);
    }

    public function color(string $color): self
    {
        return $this->clone([ 'color' => $color ]);
    }

    abstract public function toSvg(): string;

    protected function clone(array $attributes): self
    {
        $new = clone $this;
        foreach ($attributes as $key => $value) {
            $new->{$key} = $value;
        }

        return $new;
    }
}
