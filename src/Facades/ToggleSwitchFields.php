<?php

namespace SoareCostin\LaravelToggleSwitchFields\Facades;

use Illuminate\Support\Facades\Facade;

class ToggleSwitchFields extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-toggle-switch-fields';
    }
}