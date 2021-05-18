<?php 

use Philo\Blade\Blade;

function view($path, array $data = [])
{
    $views = __DIR__.'/../../resources/views';
    $cache = __DIR__.'/../../bootstrap/cache';
    $blade = new Blade($views, $cache);

    echo $blade->view()->make($path, $data)->render();
}

?>