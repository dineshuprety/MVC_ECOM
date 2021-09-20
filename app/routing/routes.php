<?php
$router = new AltoRouter;
// include admin router
include 'admin_routes.php';

// category management

$router->map('GET', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map('POST', '/admin/product/categories',
    'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category');

$router->map('POST', '/admin/product/categories/[i:id]/edit',
    'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');
    
$router->map('POST', '/admin/product/categories/[i:id]/delete',
    'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category');

// sub category management

//subcategory
$router->map('POST', '/admin/product/subcategory/create',
    'App\Controllers\Admin\SubCategoryController@store', 'create_subcategory');

$router->map('POST', '/admin/product/subcategory/[i:id]/edit',
    'App\Controllers\Admin\SubCategoryController@edit', 'edit_subcategory');

$router->map('POST', '/admin/product/subcategory/[i:id]/delete',
    'App\Controllers\Admin\SubCategoryController@delete', 'delete_subcategory');

// Size
$router->map('GET', '/admin/product/size',
    'App\Controllers\Admin\SizeController@show', 'product_size');

$router->map('POST', '/admin/product/size',
    'App\Controllers\Admin\SizeController@store', 'create_product_size');

$router->map('POST', '/admin/product/size/[i:id]/delete',
    'App\Controllers\Admin\SizeController@delete', 'delete_product_size');

    // product

$router->map('GET', '/admin/product/product',
    'App\Controllers\Admin\ProductController@showCreateProductForm', 'create_product_form');

    // slider
    $router->map('GET', '/admin/product/slider',
    'App\Controllers\Admin\SliderController@showCreateProductForm', 'create_slider');
    $router->map('GET', '/admin/product/manageslider',
    'App\Controllers\Admin\SliderController@show', 'manage_slider');