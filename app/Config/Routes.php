<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::register');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::login');
$routes->get('/user_dashboard', 'DashboardController::user_dashboard', ['filter'=> 'isLogin']);
$routes->get('/contact', 'Home::contact');
$routes->group('admin',['filter'=> 'isAdmin'], static function($routes){
    $routes->get('admin_dashboard', 'AdminDashboardController::index');
    $routes->get('users', 'AdminDashboardController::users');

    //categories
    $routes->get('product_categories', 'ProductCategoriesController::create');
    $routes->post('product_categories', 'ProductCategoriesController::create');
});

$routes->get('/generate-pdf', 'Home::generatePDF');

$routes->get('/logout', 'Home::logout');
$routes->get('/profile', 'Home::profile');
$routes->post('/profile', 'Home::profile');

//$routes->get('/sum/(:num)/(:num)', 'Home::sum/$1/$2');
