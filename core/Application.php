<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public static Application $app;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router  = new Router($this->request);
        self::$app = $this;
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}