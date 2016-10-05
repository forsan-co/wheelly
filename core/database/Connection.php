<?php

namespace Wheel\Core\Database;

class Connection 
{
    /**
     * @var PDO
     */
    protected static $connection;

    /**
     * @param array $config
     * @return PDO
     */
    public static function make($config)
    {
        try {
            self::$connection = new \PDO(
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

    /**
     * @param $mode
     */
    public static function setFetchMode($mode) 
    {
        self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $mode);
    }
}




