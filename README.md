<p align="center"><img src="assets/screenshot.png" width="300px" /></p>

A classy package to generate barcodes in Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/adamgaskins/barcoder.svg?style=flat-square)](https://packagist.org/packages/adamgaskins/barcoder)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/adamgaskins/barcoder/Tests?logo=Github&style=flat-square&label=tests)](https://github.com/adamgaskins/barcoder/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/adamgaskins/barcoder.svg?style=flat-square)](https://packagist.org/packages/adamgaskins/barcoder)

## Installation

You can install the package via composer:

```bash
composer require adamgaskins/barcoder
```

## Usage

See below for a full list of supported barcode types.

```php
Barcoder::qrcode('data to encode')->toSvg();

Barcoder::code128('data to encode')->toSvg();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Gaskins](https://github.com/AdamGaskins)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
