<?php

require '../vendor/autoload.php';

require '../core/bootstrap.php';

use Wheel\Core\{Router, Request};

Router::load('../app/routes.php')
    ->direct(Request::uri(), Request::method());
