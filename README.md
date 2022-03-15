# Eloquent Encoded IDs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/io238/eloquent-encoded-ids.svg?label=Version)](https://packagist.org/packages/io238/eloquent-encoded-ids)
[![GitHub Tests Action Status](https://github.com/io238/eloquent-encoded-ids/workflows/Tests/badge.svg?branch=master)](https://github.com/io238/eloquent-encoded-ids/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/io238/eloquent-encoded-ids.svg?label=Downloads)](https://packagist.org/packages/io238/eloquent-encoded-ids)

Automatic route key encryption for Laravel Eloquent using [Hashids](https://hashids.org/) (short, unique, non-sequential
IDs) with prefix support

## Installation

You can install the package via composer:

```bash
composer require io238/eloquent-encoded-ids
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Io238\EloquentEncodedIds\EloquentEncodedIdsServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
//
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Migge](https://github.com/io238)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
