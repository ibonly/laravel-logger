<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class LaravelLogger extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'simple_logger';

/**
 * [$fillable description]
 * @var [type]
 */
    protected $fillable = ['by', 'description', 'url', 'method', 'agent', 'ip'];
}
