<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('kamar', 'Kamar::index');
$routes->get('fasilitas', 'Fasilitas::index');
$routes->get('fasilitas/(:segment)', 'Fasilitas::detail/$1');
$routes->get('pemesanan', 'Pemesanan::index');
