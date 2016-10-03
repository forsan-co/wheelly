<?php

Application::bind('config', require 'config.php');
Application::bind('database',  new QueryBuilder(
    Connection::make(Application::get('config')['database'])
));


function view($name, $data = [])
{
    extract($data);

    return require "views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}"); 
}

