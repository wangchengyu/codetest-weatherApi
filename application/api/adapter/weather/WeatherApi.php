<?php

namespace app\adapter\weather;


class WeatherApi {

    /**
     * @var IntfApi
     */
    protected $implApi = null;

    public function __construct($source, $cityCode) {

        $className  = $source.'\ImplementsApi';

        $this->implApi = new $className($cityCode);
    }

    public function __get($name)
    {
        return $this->implApi->{$name};
    }

}
