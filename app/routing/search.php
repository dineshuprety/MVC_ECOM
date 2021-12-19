<?php

// search routeing
// $router->map('GET', '/search', 'App\Controllers\SearchController@search', 'search');

$router->map('POST' , '/search' , 
'App\Controllers\SearchController@searchProduct' ,'search_product');



?>