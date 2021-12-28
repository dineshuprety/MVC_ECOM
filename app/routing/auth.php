<?php
/**
 * !user router
 */
$router->map('GET', '/register', 'App\Controllers\AuthController@showRegisterForm', 'register');
$router->map('POST', '/register', 'App\Controllers\AuthController@register', 'register_me');

/**
 * !Wholesaler router
 */
$router->map('GET', '/inquery/wholeser', 'App\Controllers\AuthController@showWholesalerForm', 'register_wholesaler_show');
$router->map('POST', '/wholeser/details', 'App\Controllers\AuthController@registerWholeSaler', 'register_wholesaler');
/**
 *!login route
 */
$router->map('GET', '/login', 'App\Controllers\AuthController@showLoginForm', 'login');
$router->map('POST', '/login', 'App\Controllers\AuthController@login', 'log_me_in');

$router->map('GET', '/logout', 'App\Controllers\AuthController@logout', 'logout');