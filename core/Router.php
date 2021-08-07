<?php

namespace App\Core;

use Exception;

class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public $authenticatedRoutes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($routesFile)
    {

        $router = new self;

        require $routesFile;

        return $router;
    }

    public function get($uri, $controller, $auth = false)
    {
        $this->routes['GET'][$uri] = $controller;

        if ($auth) {
            $this->authenticatedRoutes['GET'][$uri] = $controller;
        }

    }

    public function post($uri, $controller, $auth = false)
    {

        $this->routes['POST'][$uri] = $controller;

        if ($auth) {
            $this->authenticatedRoutes['POST'][$uri] = $controller;
        }

    }

    public function loadController($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            if (array_key_exists($uri, $this->authenticatedRoutes[$method]) && !$this->guard()) {
                return redirect('/');
            }

            if (substr($uri, 0, 5) == 'admin' && !$this->adminGuard()) {
                return redirect('/user/logs');
            }

            $value = $this->routes[$method][$uri];
            $value = explode('@', $value);
            $controller_name = "\\App\\Controllers\\" . $value[0];
            $controller = new $controller_name;
            $method = $value[1];
            return $controller->$method();

        }

        throw new Exception('No route found for this URI');
    }

    public function guard()
    {
        return ($_SESSION['user']);
    }

    public function adminGuard()
    {
        return ($_SESSION['user']->role == 'admin');
    }
}