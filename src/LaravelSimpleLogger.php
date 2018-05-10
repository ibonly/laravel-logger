<?php

namespace Ibonly\LaravelSimpleLogger;

use Illuminate\Support\Facades\Request;
use Ibonly\LaravelSimpleLogger\Model\LaravelLogger;
use Ibonly\LaravelSimpleLogger\Model\IsOnlineLogger;

class LaravelSimpleLogger
{
    /**
     * @var LaravelLogger
     */
    protected $laravelLogger;

    /**
     * @var IsOnlineLogger
     */
    protected $onlineLogger;

    /**
     * LaravelSimpleLogger constructor.
     *
     * @param LaravelLogger $laravelLogger
     * @param IsOnlineLogger $isOnlineLogger
     */
    public function __construct(LaravelLogger $laravelLogger, IsOnlineLogger $isOnlineLogger)
    {
        $this->laravelLogger = $laravelLogger;
        $this->onlineLogger = $isOnlineLogger;
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

    /**
     * @return mixed
     */
    public function saveUser()
    {
        return $this->onlineLogger->create([
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * @return mixed
     */
    public function removeUser()
    {
        return $this->onlineLogger->whereUserId(auth()->user()->id)->delete();
    }

    /**
     * @return IsOnlineLogger[]|\Illuminate\Database\Eloquent\Collection
     */
    public function onlineUsers()
    {
        return $this->onlineLogger->all();
    }

    /**
     * @return mixed
     */
    public function onlineCount()
    {
        return $this->onlineLogger->count();
    }

}