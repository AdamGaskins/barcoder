<?php

namespace AdamGaskins\Barcoder;

use Illuminate\Support\ServiceProvider;

class BarcoderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/barcoder.php', 'barcoder');
        $this->app->singleton('barcoder', Barcoder::class);
    }

    public function boot()
    {
        $this->registerDefaultProviders();
    }

    protected function registerDefaultProviders()
    {
        $providers = array_map(
            fn($file) => 'AdamGaskins\Barcoder\Providers\\' . basename($file, '.php'),
            glob(__DIR__ . '/Providers/*.php')
        );

        app('barcoder')->registerProvider($providers);
    }
}
