# Filament Users Management Resource

Users management resource for Filament admin

## Installation

First install the following package:

- [filament-shield](https://github.com/bezhansalleh/filament-shield)

Then install this package:

Step 1: Add the package GitHub URL in composer.json under repositories

```bash
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/sharkbit-agency/filament-users-management.git"
        }
    ]
```
Step 2: Add the package name in composer.json under require

```bash
"sharkbit-agency/filament-users-management": "dev-main"
```

Publish Translation and config

```bash
php artisan vendor:publish --tag="filament-users-management-config"
php artisan vendor:publish --tag="filament-users-management-translations"
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [SharkBit Agency](https://github.com/sharkbit-agency)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
