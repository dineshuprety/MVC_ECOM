<?php

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

$router->map('GET', '/products', 'App\Controllers\ProductController@showAll', 'products');
$router->map(
    'GET', '/products/category/[*:slug]?/[*:subcategory]?',
        'App\Controllers\CategoryController@show', 'products_category');
$router->map(
    'POST', '/products/category/load-more',
    'App\Controllers\CategoryController@loadMoreProducts', 'load_more_products_cat'
);
?>