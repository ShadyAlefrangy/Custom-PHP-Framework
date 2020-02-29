<?php
use App\Core\Router;
use App\Core\Request;

require 'vendor/autoload.php';
$query = require 'core/bootstrap.php';

// die(var_dump($app));
Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());



