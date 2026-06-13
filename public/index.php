<?php

declare(strict_types=1);

use App\App;

define('APP_PATH', dirname(__DIR__));

require APP_PATH . '/vendor/autoload.php';

$app = new App();

$app->run();
