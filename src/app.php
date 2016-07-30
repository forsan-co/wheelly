<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../src/helpers.php';

$routes = new RouteCollection();
$routes->add('hello', new Route('/hello/{name}', array(
        'name' => 'World',
        '_controller' => 'render_template',
    ))
);
$routes->add('bye', new Route('/bye', array('_controller' => 'render_template')));
$routes->add('leap_year', new Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => function($request) {
        if(is_leap_year($request->attributes->get('year'))) {
            return new Response('Yes, this is a leap year!');
        }

        return new Response('No, this is not a leap year!');
    }
)));

return $routes;
