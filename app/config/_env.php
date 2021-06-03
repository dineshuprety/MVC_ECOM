<?php

//defineing the actual reference of project directory
define('BASE_PATH', realpath(__DIR__.'/../../'));

//To load the package that we installed using composer
require_once __DIR__.'/../../vendor/autoload.php';

//createing new instance of env package to access the .env file
// I have used cretaeUnsafeImmutable to access the getenv() function
$dotEnv = Dotenv\Dotenv::createUnsafeImmutable(BASE_PATH);

//load function use to load the .env file
$dotEnv->load();

?>