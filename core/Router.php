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
    public function post($path, $callback) : void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            http_response_code(404);
            return $this->renderOnlyView('_404');
        }
        if (is_string($callback)) return $this->renderView($callback);
        if (is_array($callback))  return call_user_func([new $callback[0](), $callback[1]]);

        return call_user_func($callback);
    }

    private function renderView($view): array|false|string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }
    protected function layoutContent(): false|string
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view): false|string
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }
}