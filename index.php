<?php

namespace Core;

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

define('ROOT', dirname(__FILE__));

$routes = require_once $_SERVER['DOCUMENT_ROOT']. '/project/config/routes.php';

$track = (new Router) -> getTrack($routes, $_SERVER['REQUEST_URI']);

$page = (new Dispatcher) -> getPage($track);

echo (new View) -> render($page);
