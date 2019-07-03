<?php

namespace SoareCostin\LaravelToggleSwitchFields;

use Illuminate\Support\Facades\Route;

class ToggleSwitchFields
{
    public function routes($uri, $controller, $namePrefix)
    {
        Route::get($uri . '/{switchable}/on', $controller . '@switchOn')->name($namePrefix . '.on');
        Route::get($uri . '/{switchable}/off', $controller . '@switchOff')->name($namePrefix . '.off');
    }
}