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
$router->get('register/pet', 'AuthController@showPetForm');
$router->post('register/pet', 'AuthController@registerPet');
$router->get('logout', 'AuthController@logout');
/*
 *
 * Post authorized routes, for admins and customers
 *
 */
$router->get('books', 'BooksController@index', 'auth');
$router->get('books/delete', 'BooksController@destroy', 'auth');
$router->get('books/create', 'BooksController@create', 'auth');
$router->post('books', 'BooksController@store', 'auth');
$router->get('books/edit', 'BooksController@edit', 'auth');
$router->post('books/update', 'BooksController@update', 'auth');

/**
 *
 * API ROUTES
 */

$router->get('api/books', 'ApiBooksController@index');