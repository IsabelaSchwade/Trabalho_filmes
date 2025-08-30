<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Filme::index');
$routes->get('/filmes', 'Filme::index');
$routes->get('filme/view/(:num)', 'Filme::view/$1');

$routes->get('/filme/form', 'Filme::form'); // rota para abrir o formulário
$routes->post('/filme/cadastrar', 'Filme::cadastrar'); // rota para cadastrar o filme
$routes->get('filme/editar/(:num)', 'Filme::editar/$1');

$routes->post('filme/atualizar/(:num)', 'Filme::atualizar/$1');