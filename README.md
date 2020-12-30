# :package_description

[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_name/:package_name.svg?label=Version)](https://packagist.org/packages/:vendor_name/:package_name)
[![GitHub Tests Action Status](https://github.com/:vendor_name/:package_name/workflows/Tests/badge.svg?branch=master)](https://github.com/:vendor_name/:package_name/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_name/:package_name.svg?label=Downloads)](https://packagist.org/packages/:vendor_name/:package_name)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require :vendor_name/:package_name
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Spatie\Skeleton\SkeletonServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Spatie\Skeleton\SkeletonServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$skeleton = new Io238\Skeleton();

echo $skeleton->echoPhrase('Hello World!');
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

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
