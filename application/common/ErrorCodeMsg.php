<?php
namespace app\common;

use think\Config;

/**
 * Class ErrorCodeMsg store code message array and some function
 * @package app\common
 */
class ErrorCodeMsg
{

    const CODE_INVALID              = 0;
    const CODE_OK                   = 200;
    const CODE_AUTHENTICATED        = 401;
    const CODE_NOT_FOUND            = 404;
    const CODE_FORBIDDEN            = 403;
    const CODE_SERVICE_ERROR        = 500;

    /**
     * @var store the map of code ==> message
     */
    protected static $store = null;

    /**
     * @param $code
     * @return string
     */
    public static function getMessage($code) {

        if (!self::$store) {
            self::$store = Config::get('CodeMessage');
        }

        return isset(self::$store[$code]) ? self::$store[$code] : "";
    }

}
