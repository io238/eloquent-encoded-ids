# Eloquent Encoded IDs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/io238/eloquent-encoded-ids.svg?label=Version)](https://packagist.org/packages/io238/eloquent-encoded-ids)
[![GitHub Tests Action Status](https://github.com/io238/eloquent-encoded-ids/workflows/Tests/badge.svg?branch=master)](https://github.com/io238/eloquent-encoded-ids/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/io238/eloquent-encoded-ids.svg?label=Downloads)](https://packagist.org/packages/io238/eloquent-encoded-ids)

Automatic route key encryption for Laravel Eloquent using [Hashids](https://hashids.org/) (short, unique, non-sequential
IDs) with prefix support.

---

## Background

By default Laravel uses numeric, sequential IDs for models. These numeric IDs are then also used as _route keys_:

```php
route('users.show', User::find(1)) // http://app.test/user/1
route('users.show', User::find(2)) // http://app.test/user/2
route('users.show', User::find(3)) // http://app.test/user/3
```

This package automatically encodes the model ID, so that sequence is not externally exposed:

```php
route('users.show', User::find(1)) // http://app.test/user/m8y78
route('users.show', User::find(2)) // http://app.test/user/p8b7v
route('users.show', User::find(3)) // http://app.test/user/dvd6v
```

This is useful to hide sensitive app information (e.g. total number of users, invoices, etc).


## Installation

You can install the package via composer:

```bash
composer require io238/eloquent-encoded-ids
```

## Usage

In order to encode the ID of a Laravel model, simply add the `HasEncodedIds` trait to the model: 

```php
namespace App\Models;

class User extends Model {

    use HasEncodedIds;

    // ..

}
```

### Prefixes

By default this package adds a prefix to the encoded ID, which helps to identify what type of ID has been encoded.


**Example:** The `User` model has encoded IDs starting with `u_`, such as `u_m8y78`.

It uses the model name's first letter, or you can explicitly provide a prefix as a protected property of the model:

```php
namespace App\Models;

class User extends Model {

    use HasEncodedIds;

    protected $prefix = 'usr';

}
```

## Config

This package works out-of-the-box. Nevertheless, you can publish and customize the config file with:

```bash
php artisan vendor:publish --provider="\Io238\EloquentEncodedIds\EncodedIdsProvider" --tag="config"
```

This is the contents of the default config file:

```php
return [

    // Minimum length of encoded IDs
    'length'           => 5,

    // Alphabet to be used to generate encoded IDs
    // By default this list excludes ambiguous characters
    'alphabet'         => '123456789abcdefghikmnpqrstuvwxyz',

    // Ignore uppercase/lowercase for encoded IDs
    'case-insensitive' => true,

    // Encryption salt
    // Warning: changing the salt, will produce different encoded IDs
    'salt'             => env('APP_KEY'),

    // Use a prefix to the encoded ID, to be able to recognize the model that the ID belongs to
    'prefix'           => true,

    // Character used to separate the prefix from the encoded ID
    'separator'        => '_',

];
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review the [security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Martin Migge](https://github.com/io238)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
