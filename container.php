<?php

require 'core/Application.php';

$app = new Application();
$app->a = function(){return 'hello';};
echo $app->a;