<?php
/**
 * Start session if not already started
 */
if(!isset($_SESSION)) session_start();

//load environment variable
require_once __DIR__ . '/../App/config/_env.php';

// instrantiate database class
new \App\Classes\Database();

require_once __DIR__ . '/../App/routing/routes.php';

new \App\RouteDispatcher($router);