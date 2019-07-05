<?php

namespace SoareCostin\LaravelToggleSwitchFields;

use Illuminate\Support\Facades\Route;

class ToggleSwitchFields
{
    public function routes($uri, $controller, $namePrefix)
    {
        Route::get($uri.'/{switchable}/on', [
            'uses' => $controller.'@switchOn',
            'as' => $namePrefix.'.on',
        ]);

        Route::get($uri.'/{switchable}/off', [
            'uses' => $controller.'@switchOff',
            'as' => $namePrefix.'.off',
        ]);
    }
}
