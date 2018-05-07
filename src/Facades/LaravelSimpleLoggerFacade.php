<?php

namespace Ibonly\LaravelSimpleLogger\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSimpleLoggerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LaravelSimpleLoggerLogger';
    }
}
