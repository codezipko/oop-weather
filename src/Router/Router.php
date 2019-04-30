<?php

namespace Router;

class Router {

    public $routes = [];

    public function router($action, $callback)
    {
        $action = trim($action, '/');
        $this->routes[$action] = $callback;
    }

    public function dispatchRouter($action)
    {
        $action = trim($action, '/');
        $callback = $this->routes[$action];

        return call_user_func($callback);
    }

}