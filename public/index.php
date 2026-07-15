<?php

declare(strict_types=1);

use App\Controller\HomeController;
use App\Controller\TestsController;
use App\Database\Database;

define('APP_PATH', dirname(__DIR__));

require APP_PATH . '/vendor/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === '/' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new HomeController();

    echo $controller->index();
} elseif ($path === '/tests' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new TestsController();
    echo $controller->index();
} elseif ($path === '/showTests' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $controller = new TestsController();
    echo $controller->showTests();
} else {
    echo '404 | Not Found';
}
