<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router  = new Router($this->request);
        $this->app = $this;
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}
