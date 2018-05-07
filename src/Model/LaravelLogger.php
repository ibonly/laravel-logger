<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class LaravelLogger extends Model
{
    protected $table;

    protected $fillable = ['by', 'description', 'url', 'method', 'type', 'ip'];
}