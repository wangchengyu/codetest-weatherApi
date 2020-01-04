<?php
namespace app\api\controller;

use app\common\ApiBase;
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


}
