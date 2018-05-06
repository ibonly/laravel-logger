<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class LaravelSimpleLogger extends Model
{
    protected $table;

    protected $fillable = ['by', 'description', 'url', 'method', 'type', 'ip'];
}