<?php
/*
 *
 * Visible routes, and controllers
 *
 */

$router->get('', 'AuthController@showLoginForm');
$router->post('', 'AuthController@login');
$router->get('register', 'AuthController@showRegistrationForm');
$router->post('register', 'AuthController@register');
$router->get('logout', 'AuthController@logout');

/*
 *
 * Authorized routes for admins
 *
 */

$router->get('admin/logs', 'LogsControllerAdmin@index', 'auth');
$router->get('admin/logs/delete', 'LogsControllerAdmin@destroy', 'auth');
$router->get('admin/logs/create', 'LogsControllerAdmin@create', 'auth');
$router->post('admin/logs', 'LogsControllerAdmin@store', 'auth');
$router->get('admin/logs/edit', 'LogsControllerAdmin@edit', 'auth');
$router->post('admin/logs/update', 'LogsControllerAdmin@update', 'auth');

// Admin routes for Posts Section

$router->get('admin/posts', 'PostsController@index', 'auth');
$router->get('admin/posts/delete', 'PostsController@destroy', 'auth');
$router->get('admin/posts/create', 'PostsController@create', 'auth');
$router->post('admin/posts', 'PostsController@store', 'auth');
$router->get('admin/posts/edit', 'PostsController@edit', 'auth');
$router->post('admin/posts/update', 'PostsController@update', 'auth');

/*
 * Authorized routes for users
 */

$router->get('user/logs', 'LogsControllerUser@index', 'auth');

/**
 *
 * API routes
 *
 */

$router->get('api/books', 'ApiBooksController@index');