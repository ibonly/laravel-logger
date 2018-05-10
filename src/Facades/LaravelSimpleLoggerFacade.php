<?php

namespace Ibonly\LaravelSimpleLogger\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSimpleLoggerFacade extends Facade
{
    /**
     * [getFacadeAccessor description]
     * @return [type] [description]
     */
    protected static function getFacadeAccessor()
    {
        return 'LaravelSimpleLoggerLogger';
    }
}
