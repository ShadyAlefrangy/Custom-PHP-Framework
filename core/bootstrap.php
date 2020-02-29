<?php
use App\Core\App;
// $app = [];
// $app['$config'] = require 'config.php';

// $app['database'] = new QueryBuilder(Connection::make($app['$config']['database']));

App::bind('config', require 'config.php');
App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));


function view($viewName, $data = [])
{
    extract($data);
    // if we have data like this ['name' => 'shady']
    // with extract function create variable $name = 'shady'
    return require "app/views/{$viewName}.view.php";
}

function redirect ($path)
{
    header("Location: /{$path}");
}