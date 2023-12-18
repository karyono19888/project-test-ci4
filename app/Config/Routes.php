<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('team-management', static function ($routes) {
    $routes->group('list', static function ($routes) {
        $routes->get('/', 'TeamManagement\Team::index');
        $routes->get('create', 'TeamManagement\Team::create');
        $routes->get('edit/(:any)', 'TeamManagement\Team::edit/$1');
        $routes->post('update/(:num)', 'TeamManagement\Team::update/$1');
        $routes->delete('(:num)', 'TeamManagement\Team::delete/$1');
        $routes->post('save', 'TeamManagement\Team::save');
    });

    $routes->group('players', static function ($routes) {
        $routes->get('/', 'TeamManagement\players::index');
        $routes->get('create', 'TeamManagement\players::create');
        $routes->get('edit/(:any)', 'TeamManagement\players::edit/$1');
        $routes->post('update/(:num)', 'TeamManagement\players::update/$1');
        $routes->delete('(:num)', 'TeamManagement\players::delete/$1');
        $routes->post('save', 'TeamManagement\players::save');
    });
});
