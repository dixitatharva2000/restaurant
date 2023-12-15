<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('menus', 'Home::menus');
$routes->post('menus', 'Home::menus');



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

$routes->get('delete-table/(:any)', 'Tables::delete/$1');
$routes->post('delete-table/(:any)', 'Tables::delete/$1');

$routes->get('edit-table/(:num)', 'Tables::edit_tables/$1');
$routes->post('edit-table/(:num)', 'Tables::edit/$1');

$routes->get('get-franchise/(:num)', 'Tables::getfranchise/$1');


//Category /------------------------------------------------------------------

$routes->get('category','Category::index');
$routes->post('category','Category::index');

$routes->get('edit-category/(:num)','Category::edit_category/$1');
$routes->post('edit-category/(:num)','Category::edit/$1');

$routes->get('delete_category/(:any)','Category::delete/$1');
$routes->post('delete_category/(:any)','Category::delete/$1');


//SubCategory /------------------------------------------------------------------

$routes->get('subcategory','SubCategory::index');
$routes->post('subcategory','SubCategory::index');

$routes->get('edit-subcategory/(:num)','SubCategory::edit_subcategory/$1');
$routes->post('edit-subcategory/(:num)','SubCategory::edit/$1');

$routes->get('delete-subcategory/(:any)','SubCategory::delete/$1');
$routes->post('delete-subcategory/(:any)','SubCategory::delete/$1');



// MENU SECTION |----------------------------------------------------------------

$routes->get('menu', 'Menu::index');
$routes->post('menu', 'Menu::index');

$routes->get('delete-menu/(:any)', 'Menu::delete/$1');
$routes->post('delete-menu/(:any)', 'Menu::delete/$1');

$routes->get('edit-menu/(:num)', 'Menu::edit_menu/$1');
$routes->post('edit-menu/(:num)', 'Menu::edit/$1');


$routes->get('get-subcategory/(:num)', 'Menu::getsubcategory/$1');