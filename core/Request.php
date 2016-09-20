<?php

class Request 
{
    /**
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    /**
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param string $param
     * @param null $default
     * @return null
     */
    public static function get($param, $default = null){
        return isset($_REQUEST[$param]) ?
            $_REQUEST[$param] :
            $default;
    }

    /**
     * @return array
     */
    public static function all(){
        return $_REQUEST;
    }

}
