<?php
namespace app\adapter\weather\openweatherthrmap;

class ImplementsApi extends IntfApi {

    /**
     * @var array source data from 3rd api
     */
    private $sourceData = [];

    /**
     * @var array api config
     */
    private $config = [];

    /**
     * @var string cityid in openweatherthrmap
     */
    private $cityId = '';

    /**
     * @var string adapter name
     */
    private static $name = 'openweatherthrmap';

    /**
     * ImplementsApi constructor.
     * @param $cityCode
     */
    public function __construct($cityCode) {

        $this->config = Config::get('citys')['api'][static::$name];
        $this->cityId = $this->config['city_id_map'][$cityCode];
    }

    /**
     * get source data from api
     */
    public function getSourceData() {

        $url = 'http://'.
            $this->config['host'].'/'.
            $this->config['path'].'?'.
            'id='. $this->cityId.'&'.
            'appid='.$this->config['appid'].
            'unit=metric';

        $this->sourceData = json_decode(file_get_contents($url), true);

        return $this->sourceData;
    }

    public function getCityName() {
        return $this->sourceData['name'];
    }

    public function getUpdatedTime() {
        return date('l h:i A', $this->sourceData['dt']);
    }

    public function getTemperature() {
        return number_format(
            $this->sourceData['main']['temp'] - 273.15, // this temp was Kelvin degree, so minus 273.15
            1
            );
    }

    public function getWhether() {
        return $this->sourceData['weather']['description'];
    }

    public function getWind() {
        return number_format(
            $this->sourceData['wind']['speed'] * 3.6, //this value unit was meter/sec.so transfer it to kilo/hours
            1
        );
    }
}
