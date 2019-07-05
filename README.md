# Laravel ToggleSwitch Fields

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/soarecostin/laravel-toggle-switch-fields.svg?branch=master)](https://travis-ci.org/soarecostin/laravel-toggle-switch-fields)
[![StyleCI](https://github.styleci.io/repos/195053164/shield?branch=master)](https://github.styleci.io/repos/195053164)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/soarecostin/laravel-toggle-switch-fields/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/soarecostin/laravel-toggle-switch-fields/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/soarecostin/laravel-toggle-switch-fields/badges/build.png?b=master)](https://scrutinizer-ci.com/g/soarecostin/laravel-toggle-switch-fields/build-status/master)

This package allows you to quickly implement toggle switch fields logic into your Laravel Controllers.
It comes with different field type support (boolean and timestamp) out of the box and allows you to add custom logic yourself.
This package does not provide any implementation of Toggle Switch buttons on the front-end, but just the logic needed to make any Toggle Switch work.

## Installation

In order to install this package, just run

```bash
composer require soarecostin/laravel-toggle-switch-fields
```

## Usage

### Customization
You can publish the configuration file, that contains all the available checks using:
```php
php artisan vendor:publish --provider=SoareCostin\\LaravelToggleSwitchFields\\ToggleSwitchFieldsServiceProvider
```

This will publish a `toggle_switch_fields.php` file in your config folder.

#### Available Configuration Options

The following options are available:

* Default field name - will be used as the default field name that will be toggled, for all controllers. The default value is `published`. You can overwrite this setting per each controller, as explained below, in the Controllers section
```php 
default_field => 'published'
```

### Controllers
For each Laravel Controller where you want to implement the toggle switch logic for some fields, add the `use Switchable` trait from this package:

```php

use App\Http\Controllers\Controller;
use SoareCostin\LaravelToggleSwitchFields\Traits\Switchable;

class YourCustomController extends Controller
{
    use Switchable;
    // ...
}
```

This trait will add two functions to your controller: `switchOn` and `switchOff`

### Routes
Add the following to your `routes.php` file:

```php
use SoareCostin\LaravelToggleSwitchFields\Facades\ToggleSwitchFields;

ToggleSwitchFields::routes('/your-custom-url/{your-custom-route-param}', 'YourCustomController', 'your.custom.route.prefix');
```


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information.

## License
This library is licensed under the MIT license. Please see [License file](LICENSE.md) for more information.
