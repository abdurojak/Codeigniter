<?php

namespace Config;

use App\Controllers\News;
use App\Controllers\Pages;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->get('post/', 'PostController::index');
$routes->post('post/add', 'PostController::add');
$routes->get('post/fetch', 'PostController::fetch');
$routes->get('post/edit/(:num)', 'PostController::edit/$1');
$routes->get('post/delete/(:num)', 'PostController::delete/$1');
$routes->get('post/detail/(:num)', 'PostController::detail/$1');
$routes->post('post/update', 'PostController::update');

$routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
$routes->match(['get', 'post'], 'news/edit', [News::class, 'edit']);
$routes->get('news/(:segment)', [News::class, 'view']);
$routes->get('/', [News::class, 'index']);
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('news/delete/(:segment)', [News::class, 'delete']);
$routes->get('news/update/(:segment)', [News::class, 'update']);

$routes->get('images/(:segment)', [News::class, 'showFile']);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('news/(:segment)', [News::class, 'view']);
$routes->get('news', [News::class, 'index']);
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
