<?php
$router->map('POST', '/cart', 'App\Controllers\CartController@addItem', 'add_cart_item');
$router->map('GET', '/cart', 'App\Controllers\CartController@show', 'view_cart');
$router->map('GET', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items');

$router->map('POST', '/cart/update-qty', 'App\Controllers\CartController@updateQuantity', 'update_cart_qty');
$router->map('POST', '/cart/remove-item', 'App\Controllers\CartController@removeItem', 'remove_cart_item');
$router->map('POST', '/cart/empty', 'App\Controllers\CartController@emptyCart', 'empty_cart');


// check out
$router->map('GET', '/checkout', 'App\Controllers\CheckOutController@show', 'view_checkout');
$router->map('GET', '/checkout/items', 'App\Controllers\CheckOutController@getCheckOutItems', 'get_checkout_items');
$router->map('POST', '/checkout/store', 'App\Controllers\CheckOutController@CheckoutStore', 'checkout_store');


// cash order 

$router->map('POST', '/cash/order', 'App\Controllers\CashController@CashOrder', 'cash_order');
