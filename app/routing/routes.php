<?php
$router = new AltoRouter;

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
// $router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'feature_product');
$router->map('GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_product');
$router->map('POST', '/load-more', 'App\Controllers\IndexController@loadMoreProducts', 'load_more_product');

$router->map('GET', '/product/[i:id]', 'App\Controllers\ProductController@show', 'product');
$router->map('GET', '/product-details/[i:id]', 'App\Controllers\ProductController@get', 'product_details');

// search routeing
$router->map('POST' , '/search' , 
'App\Controllers\IndexController@search' ,'search_product');

// cart routeing
$router->map('POST', '/cart', 'App\Controllers\CartController@addItem', 'add_cart_item');
$router->map('GET', '/cart', 'App\Controllers\CartController@show', 'show_cart_item');
$router->map('GET', '/cart/items', 'App\Controllers\CartController@getCartItems', 'get_cart_items');


// include admin router
include 'admin_routes.php';

