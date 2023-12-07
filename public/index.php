<?php
require_once __DIR__ . "/../vendor/autoload.php";

use app\core\Application;

$app = new Application();

$app->router->get('/ali', function (){
    return 'get mahdi';
});

$app->run();