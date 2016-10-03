<?php 

class Application
{
	/**
	 * @var array
	 */
	protected static $container = [];

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function bind($key, $value){
       static::$container[$key] = $value; 
    }

    public static function get($key){
        return array_key_exists($key, static::$container) ?
            static::$container[$key] : 
            null;
    }
}