<?php

/**
 * pending orders
 */
$router->map('GET', '/admin/pending/orders', 'App\Controllers\Admin\OrderController@showPendingOrders', 'show_Pending_Orders');
$router->map('POST', '/pending/orders/list', 'App\Controllers\Admin\OrderController@PendingOrders', 'Pending_Orders');
$router->map('GET', '/admin/pending/details/[i:id]', 'App\Controllers\Admin\OrderController@PendingOrdersDetails', 'show_Pending_Orders_details');

/**
 * confirm orders
 */
$router->map('GET', '/admin/confirm/orders', 'App\Controllers\Admin\OrderController@showConfirmOrders', 'show_Confirm_Orders');
$router->map('POST', '/confirm/orders/list', 'App\Controllers\Admin\OrderController@ConfirmedOrders', 'Confirm_Orders');

/**
 * Processing orders
 */
$router->map('GET', '/admin/processing/orders', 'App\Controllers\Admin\OrderController@ShowProcessingOrders', 'show_Processing_Orders');
$router->map('POST', '/processing/orders/list', 'App\Controllers\Admin\OrderController@ProcessingOrders', 'Processing_Orders');

/**
 * picked orders
 */
$router->map('GET', '/admin/picked/orders', 'App\Controllers\Admin\OrderController@ShowPickedOrders', 'show_Picked_Orders');
$router->map('POST', '/picked/orders/list', 'App\Controllers\Admin\OrderController@PickedOrders', 'Picked_Orders');

/**
 * shipped orders
 */
$router->map('GET', '/admin/shipped/orders', 'App\Controllers\Admin\OrderController@ShowShippedOrders', 'show_Shipped_Orders');
$router->map('POST', '/shipped/orders/list', 'App\Controllers\Admin\OrderController@ShippedOrders', 'Shipped_Orders');

/**
 * delivered orders
 */
$router->map('GET', '/admin/delivered/orders', 'App\Controllers\Admin\OrderController@ShowDeliveredOrders', 'show_delivered_Orders');
$router->map('POST', '/delivered/orders/list', 'App\Controllers\Admin\OrderController@DeliveredOrders', 'delivered_Orders');

/**
 * cancel orders
 */
$router->map('GET', '/admin/cancel/orders', 'App\Controllers\Admin\OrderController@ShowCancelOrders', 'show_cancel_Orders');
$router->map('POST', '/cancel/orders/list', 'App\Controllers\Admin\OrderController@CancelOrders', 'cancel_Orders');
$router->map('POST', '/admin/cancel/orders/[i:id]', 'App\Controllers\Admin\OrderController@Cancel', 'cancel');


/**
 * Changing orders
 */
$router->map('GET', '/pending/confirm/[i:id]', 'App\Controllers\Admin\OrderController@PendingToConfirm', 'Pending_To_Confirm');

$router->map('GET', '/confirm/processing/[i:id]', 'App\Controllers\Admin\OrderController@ConfirmToProcessing', 'Confirm__To_Processing');

$router->map('GET', '/processing/picked/[i:id]', 'App\Controllers\Admin\OrderController@ProcessingToPicked', 'Processing_To_Picked');

$router->map('GET', '/picked/shipped/[i:id]', 'App\Controllers\Admin\OrderController@PickedToShipped', 'Picked_To_Shipped');

$router->map('GET', '/shipped/delivered/[i:id]', 'App\Controllers\Admin\OrderController@ShippedToDelivered', 'Shipped_To_Delivered');

/**
 * Deleted orders
 */

$router->map('POST', '/admin/delete/orders/[i:id]', 'App\Controllers\Admin\OrderController@DeleteCancelOrder', 'Delete_Cancel_Order');

/**
 * Downlaod PDF
 */
$router->map('GET', '/admin/pdf/downlaod/[i:id]', 'App\Controllers\Admin\OrderController@InvoiceDownload', 'Invoice_Download');


/**
 * order track
 */
$router->map('POST', '/order/tracking', 'App\Controllers\Admin\OrderController@OrderTraking', 'Order_Traking');

?>