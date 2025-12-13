<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('booking/process', 'Home::processBooking');

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('login', 'Admin::login');
    $routes->post('login/auth', 'Admin::auth');
    
    $routes->get('kamar/create', 'Admin::createKamar');
    $routes->post('kamar/store', 'Admin::storeKamar');
    
    $routes->get('fasilitas/create', 'Admin::createFasilitas');
    $routes->post('fasilitas/store', 'Admin::storeFasilitas');
});

// Auth Routes (Member)
$routes->group('auth', function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login/auth', 'Auth::auth');
    
    $routes->get('register', 'Auth::register');
    $routes->post('register/store', 'Auth::store');
});
