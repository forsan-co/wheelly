<?php

$tasks = $app['database']->selectAll('todos');
$app['database']->insert(['description' => 'test', 'completed' => 1], 'todos');
require 'views/index.view.php';
