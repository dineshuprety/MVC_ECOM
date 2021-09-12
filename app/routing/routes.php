<?php
$router = new AltoRouter;
$router->map('GET', '/', 'App\Controllers\IndexController@show', 'home');

//for admin routes
$router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');


// product management

$router->map('GET', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map('POST', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category');

$router->map('POST', '/admin/product/categories/[i:id]/edit',
    'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');
    
$router->map('POST', '/admin/product/categories/[i:id]/delete',
    'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category');