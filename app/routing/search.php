<?php

// search routeing
$router->map('GET', '/search', 'App\Controllers\SearchController@show', 'search');

$router->map('POST' , '/search-product' , 
'App\Controllers\SearchController@search' ,'search_product');

?>