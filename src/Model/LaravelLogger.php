<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class LaravelLogger extends Model
{
    protected $table = 'simple_logger';

    protected $fillable = ['by', 'description', 'url', 'method', 'agent', 'ip'];
}