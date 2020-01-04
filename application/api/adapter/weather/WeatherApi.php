<?php

namespace app\api\adapter\weather;


class WeatherApi {

    /**
     * @var IntfApi
     */
    protected $implApi = null;

    public function __construct($source, $cityCode) {

        $className  = 'app\api\adapter\weather\\'.$source.'\ImplementsApi';

        $this->implApi = new $className($cityCode);
        $this->implApi->getSourceData();
    }

    public function __call($name, $arguments)
    {
        return call_user_func([$this->implApi, $name]);
    }

}
