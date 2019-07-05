# Laravel ToggleSwitch Fields

[![Build Status](https://travis-ci.org/soarecostin/laravel-toggle-switch-fields.svg?branch=master)](https://travis-ci.org/soarecostin/laravel-toggle-switch-fields)
[![StyleCI](https://github.styleci.io/repos/195053164/shield?branch=master)](https://github.styleci.io/repos/195053164)

This package allows you to quickly implement toggle switch fields logic into your Laravel Controllers.
It comes with different field type support (boolean and timestamp) out of the box and allows you to add custom logic yourself.
This package does not provide any implementation of Toggle Switch buttons on the front-end, but just the logic needed to make any Toggle Switch work.

## Installation

In order to install this package, just run

```bash
composer require soarecostin/laravel-toggle-switch-fields
```

## Usage

### Controllers
```php

use App\Http\Controllers\Controller;
use SoareCostin\LaravelToggleSwitchFields\Traits\Switchable;

class YourCustomController extends Controller
{
    use Switchable;
    // ...
}
```

### Routes
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
