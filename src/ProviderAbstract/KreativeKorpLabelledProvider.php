<?php


namespace AdamGaskins\Barcoder\ProviderAbstract;

abstract class KreativeKorpLabelledProvider extends KreativeKorpProvider
{
    protected bool $showLabel = true;

    public function hideLabel(): self
    {
        $this->showLabel = false;

        return $this;
    }

    protected function getOptions(): array
    {
        return array_merge(parent::getOptions(), [
            'showLabel' => $this->showLabel,
            'p' => $this->showLabel ? 10 : 0,
            'th' => $this->showLabel ? 10 : 0,
            'wq' => $this->showLabel ? 1 : 0,
        ]);
    }
}
