<?php

$router->map('GET', '/register', 'App\Controllers\AuthController@showRegisterForm', 'register');
$router->map('POST', '/register', 'App\Controllers\AuthController@register', 'register_me');

$router->map('GET', '/login', 'App\Controllers\AuthController@showLoginForm', 'login');
$router->map('POST', '/login', 'App\Controllers\AuthController@login', 'log_me_in');

$router->map('GET', '/logout', 'App\Controllers\AuthController@logout', 'logout');