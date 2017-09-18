# Laravel GitHub Webhooks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dependenci/github-webhooks.svg?style=flat-square)](https://packagist.org/packages/dependenci/github-webhooks)
[![Software License](https://img.shields.io/badge/license-MPLv2.0-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/dependenci/github-webhooks.svg?style=flat-square)](https://packagist.org/packages/dependenci/github-webhooks)

# DEPRECATED: This package is deprecated. You can use [m1guelpf/laravel-gh-webhooks](https://github.com/m1guelpf/laravel-gh-webhooks) instead.

Easy-to-use class to transform GitHub Webhooks to Laravel Events.

## Installation

You can install the package via composer using this command:

``` bash
composer require dependenci/github-webhooks
```

## Usage

``` php
use GHWebhooks;

public function handleWebhook()
{
  return GHWebhooks::handle();
}
```

## Contributing

Read our [CONTRIBUTING.md](CONTRIBUTING.md) for more details on how to help us.

## Security

If you find any security related issues, please send an email to soy@miguelpiedrafita.com instead of using the issue tracker.

## Credits

- [Miguel Piedrafita](https://github.com/m1guelpf)
- [All Contributors](../../contributors)

## License

This package is licensed under the Mozilla Public License 2.0 ("MPL-2.0"). Please see [LICENSE.md](LICENSE.md) for more information.
