<?php
use Philo\Blade\Blade;

function view($path, array $data = [])
{
    $view = __DIR__ . '/../../resoures/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path, $data)->render();
}