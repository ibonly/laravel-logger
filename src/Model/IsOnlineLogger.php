<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class IsOnlineLogger extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'simple_is_online_logger';

    /**
     * [$fillable description]
     * @var array
     */
    protected $fillable = ['user_id'];
}
