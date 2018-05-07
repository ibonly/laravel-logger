<?php

namespace Ibonly\LaravelSimpleLogger\Exception;

use Exception;
use Ibonly\LaravelSimpleLogger\Model\LaravelLogger;

class InvalidConfiguration extends Exception
{
    public static function modelIsNotValid(string $className)
    {
        return new static("The given model class `$className` does not extend `".LaravelLogger::class.'`');
    }
}