<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Filme::index');
$routes->get('/filmes', 'Filme::index');
$routes->get('filme/view/(:num)', 'Filme::view/$1');


