<?php

$router->map('GET', '/user/dashboard', 'App\Controllers\UserController@show', 'user_dashboard');
$router->map('POST', '/user/changeinformation', 'App\Controllers\UserController@changeUserInformation', 'chnage_user_informaton');
$router->map('POST', '/user/changepassword', 'App\Controllers\UserController@changePassword', 'chnage_user_password');

