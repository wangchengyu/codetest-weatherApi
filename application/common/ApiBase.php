<?php
    namespace app\common;


    use think\Controller;

    /**
     * Class ApiBase : api base behavior method
     * @package app\api\controller
     */
    class ApiBase extends Controller
    {

        /**
         * return some api data
         * @param $result
         * @param int $code
         * @param string $msg
         * @return \think\response\Json
         */
        public static function jsonResult($result, $code = ErrorCodeMsg::CODE_OK, $message = '') {

            $message === "" ? $message = ErrorCodeMsg::getMessage($code) : null;

            return json([
                'code' => $code,
                'message' => $message,
                'result' => $result
            ]);
        }

    }
