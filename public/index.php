<?php


require_once __DIR__ . "/../vendor/autoload.php";
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/ali', [\app\controller\siteController::class, 'index']);
$app->router->get('/', 'index');

$app->run();