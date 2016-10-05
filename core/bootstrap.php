<?php

use Wheel\Core\Application;
use Wheel\Core\Database\Connection;
use Wheel\Core\Database\QueryBuilder;

Application::bind('config', require '../config.php');
Application::bind('database',  new QueryBuilder(
    Connection::make(Application::get('config')['database'])
));


function view($name, $data = [])
{
    extract($data);

    return require "../app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}"); 
}

