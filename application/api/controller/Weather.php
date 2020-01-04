<?php
namespace app\api\controller;

use app\common\ApiBase;
use app\api\model\WeatherModel;
use think\Config;

class Weather extends ApiBase
{
    /**
     * return city list from the config file extend/citys.php
     * @return array
     */
    public function getCitys() {
        return ApiBase::jsonResult(Config::get('Citys')['city_list']);
    }

    /**
     * get weather , and return it
     * @param $cityCode
     * @return \think\response\Json
     */
    public function getWeather($cityCode) {

        $weatherInfo = WeatherModel::instance($cityCode)->getWeather();

        if (!$weatherInfo)
            return ApiBase::jsonResult("", ApiBase::CODE_NOT_FOUND);

        return ApiBase::jsonResult($weatherInfo);
    }

}
