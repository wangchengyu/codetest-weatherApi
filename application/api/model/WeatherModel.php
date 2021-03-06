<?php


    namespace app\api\model;

    use app\api\adapter\weather\WeatherApi;
    use think\Config;


    class WeatherModel
    {

        /**
         * @var mixed save city weather adapter object, can store multiple city weather information
         */
        private static $containers = [];

        /**
         * build a single instance
         * @return object Weather Model
         */
        public static function instance($cityCode) {

            if (!isset(static::$containers[$cityCode]) || static::$containers[$cityCode] === null) {

                $adapter = Config::get('WeatherApi')['from'];

                static::$containers[$cityCode] = new WeatherModel($adapter, $cityCode);
            }

            return static::$containers[$cityCode];
        }

        /**
         * @var WeatherApi|null
         */
        public $adapter = null;

        /**
         * Weather constructor.
         * @param $adapter
         * @param $cityCode
         */
        public function __construct($adapter, $cityCode) {
            $this->adapter = new WeatherApi($adapter, $cityCode);
        }

        /**
         * get weather
         * @return array
         */
        public function getWeather() {
            return [
                ['label' => 'City',             'value' => $this->adapter->getCityName()],
                ['label' => 'Updated time' ,    'value' => $this->adapter->getUpdatedTime()],
                ['label' => 'Weather',          'value' => $this->adapter->getWeather()],
                ['label' => 'Temperature',      'value'  => $this->adapter->getTemperature()],
                ['label' => 'Wind',             'value'  => $this->adapter->getWind()],
            ];
        }
    }
