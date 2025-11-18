<?php

use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\MitraController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/create', 'MitraController::create');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::attemptRegister');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/api/mitra', 'MitraController::createApi');

$routes->get('/admin/dashboard', 'AdminController::index', ['filter' => 'auth']);
$routes->resource('admin/mitra', ['controller' =>'MitraController', 'filter' => 'auth']);

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/dashboard', function() {
        return redirect()->to('/admin/dashboard');
    });
});
