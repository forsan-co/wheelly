<?php

require 'core/Application.php';
require 'core/Router.php';
require 'core/database/Connection.php';
require 'core/database/QueryBuilder.php';
require 'core/Request.php';

$app = new Application();

$app['config'] = require 'config.php';
$app['database'] =  new QueryBuilder(
    Connection::make($app['config']['database'])
);


