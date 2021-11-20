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

require_once  __DIR__ . '/cart.php';

require_once __DIR__ . '/auth.php';

require_once __DIR__ . '/admin_routes.php';
