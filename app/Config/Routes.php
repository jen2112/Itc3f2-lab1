<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test', 'MainController::test');
$routes->get('/Delete/(:any)', 'MainController::Delete/$1');
$routes->post('/Save', 'MainController::Save');
$routes->get('/Update/(:any)', 'MainController::Update/$1');