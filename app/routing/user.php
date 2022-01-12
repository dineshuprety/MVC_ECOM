<?php

$router->map('GET', '/user/dashboard', 'App\Controllers\UserController@show', 'user_dashboard');
$router->map('POST', '/user/changeinformation', 'App\Controllers\UserController@changeUserInformation', 'chnage_user_informaton');
$router->map('POST', '/user/changepassword', 'App\Controllers\UserController@changePassword', 'chnage_user_password');


/**
 * Downlaod PDF
 */
$router->map('GET', '/user/pdf/downlaod/[i:id]', 'App\Controllers\UserController@InvoiceDownload', 'my_Invoice_Download');

/**
 * userorderlist
 */
$router->map('POST', '/user/pending/orders/list', 'App\Controllers\UserController@MyOrders', 'My_Orders');
?>