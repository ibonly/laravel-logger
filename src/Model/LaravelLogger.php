<?php

namespace Ibonly\LaravelLogger\Model;

use Illuminate\Database\Eloquent\Model;

class LaravelLogger extends Model
{
    protected $table;

    protected $fillable = ['by', 'description', 'url', 'method', 'type', 'ip'];

    protected $guard = [];

    public function __construct(array $attriute = []) {
        $this->table = config('laravellogger.table_name');

        parent::__construct($attriute);
    }
}