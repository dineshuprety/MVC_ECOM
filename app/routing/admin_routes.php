<?php

    //for admin routes
    $router->map('GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');

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

$router->map('GET', '/admin/category/[i:id]/selected',
'App\Controllers\Admin\ProductController@getSubcategories', 'selected_category');

$router->map('GET', '/admin/product/create',
'App\Controllers\Admin\ProductController@showCreateProductForm', 'create_product_form');

$router->map('POST', '/admin/product/create',
'App\Controllers\Admin\ProductController@store', 'create_product');

$router->map('GET', '/admin/product/[i:id]/edit',
'App\Controllers\Admin\ProductController@showEditProductForm', 'edit_product_form');

$router->map('POST', '/admin/product/edit',
'App\Controllers\Admin\ProductController@edit', 'edit_product');

$router->map('GET', '/admin/products',
    'App\Controllers\Admin\ProductController@show', 'show_products');

$router->map('POST', '/admin/product/[i:id]/delete',
    'App\Controllers\Admin\ProductController@deleteProduct', 'delete_product');

// slider
$router->map('GET', '/admin/slider',
'App\Controllers\Admin\SliderController@showCreateSliderForm', 'show_form');

$router->map('GET', '/admin/manageslider',
'App\Controllers\Admin\SliderController@show', 'manage_slider');

$router->map('POST', '/admin/slider/create',
'App\Controllers\Admin\SliderController@store', 'create_slider');

$router->map('GET', '/admin/slider/[i:id]/edit',
'App\Controllers\Admin\SliderController@showEditSlidertForm', 'edit_slider_form');

$router->map('POST', '/admin/slider/edit',
'App\Controllers\Admin\SliderController@edit', 'edit_slider');

$router->map('POST', '/admin/slider/[i:id]/delete',
'App\Controllers\Admin\SliderController@delete', 'delete_slider');
//get users 
$router->map('GET', '/admin/users/retailers',
'App\Controllers\Admin\ViewUserController@getRetailers', 'get_retailers');

// wholesalers
$router->map('GET', '/admin/users/wholesalers',
'App\Controllers\Admin\WholesalerController@getWholesalers', 'get_wholesalers');

$router->map('GET', '/admin/users/wholesalers/[i:id]/updateStatus',
'App\Controllers\Admin\WholesalerController@changeStatus', 'update_status');

$router->map('POST', '/admin/users/wholesalers/[i:id]/delete',
'App\Controllers\Admin\WholesalerController@delete', 'delete_wholesalers');

//get admins
$router->map('GET', '/admin/users/admins',
'App\Controllers\Admin\AdminController@getAdmin', 'get_admins');
?>