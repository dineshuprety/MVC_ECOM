<?php
$router = new AltoRouter;

$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');
// $router->map('GET', '/featured', 'App\Controllers\IndexController@featuredProducts', 'feature_product');
$router->map('GET', '/get-products', 'App\Controllers\IndexController@getProducts', 'get_product');
$router->map('POST', '/load-more', 'App\Controllers\IndexController@loadMoreProducts', 'load_more_product');

$router->map('GET', '/product/[i:id]', 'App\Controllers\ProductController@show', 'product');
$router->map('GET', '/product-details/[i:id]', 'App\Controllers\ProductController@get', 'product_details');

$router->map('GET', '/about', 'App\Controllers\IndexController@aboutMe', 'about_me');
$router->map('GET', '/contact', 'App\Controllers\IndexController@contactMe', 'contact_me');
$router->map('POST', '/contact/store', 'App\Controllers\IndexController@addContact', 'add_contact');

// hot products page
$router->map('GET', '/hotsales', 'App\Controllers\HotsalesController@show', 'hot_products');
$router->map('GET', '/hot-get-products', 'App\Controllers\HotsalesController@getProducts', 'hot_get_product');
$router->map('POST', '/hot-load-more', 'App\Controllers\HotsalesController@loadMoreProducts', 'hot_load_more_product');

// viewproduct
$router->map('GET', '/viewproduct/[i:id]', 'App\Controllers\IndexController@viewProduct', 'view_products');

require_once  __DIR__ . '/cart.php';

require_once __DIR__ . '/auth.php';

require_once __DIR__ . '/admin_routes.php';

require_once __DIR__ . '/search.php';

require_once __DIR__ . '/category.php';

require_once __DIR__ . '/user.php';

require_once __DIR__ . '/order.php';
