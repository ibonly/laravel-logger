<?php

namespace Ibonly\LaravelSimpleLogger;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Ibonly\LaravelLogger\Model\LaravelSimpleLogger;

class LaravelLogger
{
    protected $auth;

    protected $laravelLogger;

    public function __construct(Auth $auth, LaravelSimpleLogger $logger)
    {
        $this->auth = $auth;
        $this->laravelLogger = $logger;
    }

    public function saveLog($description)
    {
        return 123;
    }
}