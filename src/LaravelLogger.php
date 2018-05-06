<?php

namespace Ibonly\LaravelLogger;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Ibonly\LaravelLogger\Model\LaravelLogger;

class LaravelLogger
{
    protected $auth;

    protected $laravelLogger;

    public function __construct(Auth $auth, LaravelLogger $logger)
    {
        $this->auth = $auth;
        $this->laravelLogger = $logger;
    }

    public function saveLog($description)
    {
        
    }
}