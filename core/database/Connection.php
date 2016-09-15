<?php

class Connection 
{
    protected static $connection;

    public static function make($config)
    {
        try {
            self::$connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );

            return self::$connection;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function setFetchMode($mode) 
    {
        self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $mode);

        return self;
    }
}




