<?php

namespace app\core;

use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];
    public Request $request;

    public function __construct(\app\core\Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback) : void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) return "Not Found";
        if (is_string($callback)) return $this->renderView($callback);
        return call_user_func($callback);
    }

    private function renderView($view)
    {

    }
}