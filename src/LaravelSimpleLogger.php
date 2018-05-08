<?php

namespace Ibonly\LaravelSimpleLogger;

use Illuminate\Support\Facades\Request;
use Ibonly\LaravelSimpleLogger\Model\LaravelLogger;

class LaravelSimpleLogger
{
    /**
     * @var LaravelLogger
     */
    protected $laravelLogger;

    /**
     * LaravelSimpleLogger constructor.
     *
     * @param LaravelLogger $laravelLogger
     */
    public function __construct(LaravelLogger $laravelLogger)
    {
        $this->laravelLogger = $laravelLogger;
    }

    /**
     * @param string $description
     *
     * @return mixed
     */
    public function saveLog($description)
    {
        return $this->laravelLogger->create([
            'by' => auth()->user()->id,
            'description' => $description,
            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'agent' => Request::header('user-agent'),
            'ip' => Request::ip()
        ]);
    }

    /**
     * @return string
     */
    public function getLogs()
    {
        return $this->laravelLogger->all()->toJson();
    }

    /**
     * @param int | null $id
     *
     * @return mixed
     */
    public function getUserLogs($id = null)
    {
        $userId = (is_null($id)) ? auth()->user()->id : $id;

        return $this->laravelLogger->whereBy($userId)->get();
    }


}