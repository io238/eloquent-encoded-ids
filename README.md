# Automatic route key encryption for Laravel Eloquent using Hashids (short, unique, non-sequential ids) with prefix support

[![Latest Version on Packagist](https://img.shields.io/packagist/v/io238/eloquent-encoded-ids.svg?label=Version)](https://packagist.org/packages/io238/eloquent-encoded-ids)
[![GitHub Tests Action Status](https://github.com/io238/eloquent-encoded-ids/workflows/Tests/badge.svg?branch=master)](https://github.com/io238/eloquent-encoded-ids/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/io238/eloquent-encoded-ids.svg?label=Downloads)](https://packagist.org/packages/io238/eloquent-encoded-ids)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require io238/eloquent-encoded-ids
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Io238\EloquentEncodedIds\EloquentEncodedIdsServiceProvider" --tag="migrations"
php artisan migrate
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
$eloquent-encoded-ids = new Io238\EloquentEncodedIds();

echo $eloquent-encoded-ids->echoPhrase('Hello World!');
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

- [Martin Migge](https://github.com/io238)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
