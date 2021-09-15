<?php
$router = new AltoRouter;
// include admin router
include 'adminrouter.php';

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

$router->map('POST', '/admin/product/subcategory/create',
    'App\Controllers\Admin\SubCategoryController@store', 'create_subcategory');