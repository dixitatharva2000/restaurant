<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('menus', 'Home::menus');
$routes->post('menus', 'Home::menus');

$routes->get('booktable', 'Home::booktable');
$routes->post('booktable', 'Home::booktable');


// ADMIN SECTION |----------------------------------------------------------------

$routes->get('login', 'Admin::login');
$routes->post('login', 'Admin::login');

$routes->get('dashboard', 'Admin::dashboard');
$routes->post('dashboard', 'Admin::dashboard');

$routes->get('logout', 'Admin::logout');
$routes->post('logout', 'Admin::logout');

// RESTAURENT SECTION |----------------------------------------------------------------

$routes->get('restaurent', 'Restaurent::index');
$routes->post('restaurent', 'Restaurent::index');

$routes->get('delete/(:any)', 'Restaurent::delete/$1');
$routes->post('delete/(:any)', 'Restaurent::delete/$1');

$routes->get('edit-restaurent/(:num)', 'Restaurent::edit_restaurent/$1');
$routes->post('edit-restaurent/(:num)', 'Restaurent::edit/$1');

// FRANCHISE SECTION |----------------------------------------------------------------

$routes->get('franchise', 'Franchise::index');
$routes->post('franchise', 'Franchise::index');

$routes->get('delete-franchise/(:any)', 'Franchise::delete/$1');
$routes->post('delete-franchise/(:any)', 'Franchise::delete/$1');

$routes->get('edit-franchise/(:num)', 'Franchise::edit_franchise/$1');
$routes->post('edit-franchise/(:num)', 'Franchise::edit/$1');


// TABLES SECTION |----------------------------------------------------------------

$routes->get('tables', 'Tables::index');
$routes->post('tables', 'Tables::index');

$routes->get('delete-tables/(:any)', 'Tables::delete/$1');
$routes->post('delete-tables/(:any)', 'Tables::delete/$1');

$routes->get('edit-tables/(:num)', 'Tables::edit_tables/$1');
$routes->post('edit-tables/(:num)', 'Tables::edit/$1');




