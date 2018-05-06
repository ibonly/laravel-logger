<?php

namespace Ibonly\LaravelLogger\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelLoggerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelLogger';
    }
}
