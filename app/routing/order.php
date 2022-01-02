<?php

/**
 * pending orders
 */
$router->map('GET', '/admin/pending/orders', 'App\Controllers\Admin\OrderController@showPendingOrders', 'show_Pending_Orders');
$router->map('POST', '/pending/orders/list', 'App\Controllers\Admin\OrderController@PendingOrders', 'Pending_Orders');


$router->map('GET', '/admin/pending/details/[i:id]', 'App\Controllers\Admin\OrderController@PendingOrdersDetails', 'show_Pending_Orders_details');

?>