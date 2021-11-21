<?php

$router->map('GET', '/products', 'App\Controllers\ProductController@showAll', 'products');
$router->map(
    'GET', '/products/category/[*:slug]?/[*:subcategory]?',
        'App\Controllers\CategoryController@show', 'products_category');
$router->map(
    'POST', '/products/category/load-more',
    'App\Controllers\CategoryController@loadMoreProducts', 'load_more_products_cat'
);
?>