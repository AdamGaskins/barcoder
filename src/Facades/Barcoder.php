<?php

namespace AdamGaskins\Barcoder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void function providers(array|string $providers) {
 *
 * @see \AdamGaskins\Barcoder\Barcoder
 */
class Barcoder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'barcoder';
    }
}
