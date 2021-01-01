<?php

namespace AdamGaskins\Barcoder;

use ReflectionClass;

class Barcoder
{
    protected $providers = [];

    /**
     * @param $providers string|array The providers to register
     */
    public function registerProvider($providers) {
        $providers = is_array($providers) ? $providers : func_get_args();

        foreach($providers as $providerClass) {
            if(!is_subclass_of($providerClass, BarcoderProvider::class) ||
                (new ReflectionClass($providerClass))->isAbstract()) {
                throw new \InvalidArgumentException('Not a valid Barcoder provider: ' . $providerClass);
            }

            $this->providers[(new $providerClass)->identifier] = $providerClass;
        }
    }

    public function new($identifier, string $data = '')
    {
        if(!array_key_exists($identifier, $this->providers)) {
            throw new \InvalidArgumentException('Barcoder provider not found: ' . $identifier);
        }

        return new $this->providers[$identifier]($data);
    }

    public function __call($name, $arguments)
    {
        return $this->new($name, ...$arguments);
    }
}
