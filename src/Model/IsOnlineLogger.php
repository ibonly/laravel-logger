<?php

namespace Ibonly\LaravelSimpleLogger\Model;

use Illuminate\Database\Eloquent\Model;

class IsOnlineLogger extends Model
{
    protected $table = 'simple_is_online_logger';

    protected $fillable = ['user_id'];
}