<?php

class Request 
{
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function get($param, $default = null){
        return isset($_REQUEST[$param]) ?
            $_REQUEST[$param] :
            $default;
    }

    public static function all(){
        return $_REQUEST;
    }

}
