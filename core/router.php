<?php
namespace App\Core;

class Router {

    public $routes = [
        'GET' => [],
        'POST' => []
    ];
    

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType) {

        if (array_key_exists($uri, $this->routes[$requestType])) {

            // die($this->routes[$requestType][$uri]); // This return PagesController@home
            // return $this->routes[$requestType][$uri];
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri]) // explode return array and ... match array element to parameter of function
            );
        }

        throw new \Exception('No Route define for your URI.');
    }

    public function callAction($controller, $action)
    {
        
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller();
        if (! method_exists($controller, $action)) {
            throw new \Exception("{$controller} does not respond to the {$action} action");
            
        }
        
        return $controller->$action();


    }
}