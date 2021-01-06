<?php

namespace AdamGaskins\Barcoder;

use ReflectionClass;

/**
 * @method static \AdamGaskins\Barcoder\Providers\Code128 code128(string $data)
 * @method static \AdamGaskins\Barcoder\Providers\Datamatrix datamatrix(string $data)
 * @method static \AdamGaskins\Barcoder\Providers\QRCode qrcode(string $data)
 */
class Barcoder
{
    protected static $instance = null;

    protected $providers = [];

    public function __construct()
    {
        $providers = array_map(
            fn ($file) => 'AdamGaskins\Barcoder\Providers\\' . basename($file, '.php'),
            glob(__DIR__ . '/Providers/*.php')
        );

        $this->_registerProvider($providers);
    }

    protected function _registerProvider($providers)
    {
        $providers = is_array($providers) ? $providers : func_get_args();

        foreach ($providers as $providerClass) {
            if (! is_subclass_of($providerClass, BarcoderProvider::class) ||
                (new ReflectionClass($providerClass))->isAbstract()) {
                throw new \InvalidArgumentException('Not a valid Barcoder provider: ' . $providerClass);
            }

            $this->providers[(new $providerClass)->identifier] = $providerClass;
        }
    }

    /**
     * @param $providers string|array The providers to register
     */
    public static function registerProvider($providers)
    {
        static::instance()->_registerProvider($providers);
    }

    public static function new($identifier, string $data = '')
    {
        if (! array_key_exists($identifier, static::instance()->providers)) {
            throw new \InvalidArgumentException('Barcoder provider not found: ' . $identifier);
        }

        $providerClass = static::instance()->providers[$identifier];

        return new $providerClass($data);
    }

    public static function __callStatic($name, $arguments)
    {
        return static::new($name, ...$arguments);
    }

    protected static function instance()
    {
        return static::$instance ?? (static::$instance = new Barcoder());
    }
}
