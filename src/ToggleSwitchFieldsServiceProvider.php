<?php

namespace SoareCostin\LaravelToggleSwitchFields;

use Illuminate\Support\ServiceProvider;
use SoareCostin\LaravelToggleSwitchFields\ToggleSwitchFields;

class ToggleSwitchFieldsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('toggle_switch_fields.php'),
        ]);
    }

    public function register()
    {
        $this->app->bind('laravel-toggle-switch-fields', function () {
            return new ToggleSwitchFields();
        });
    }
}