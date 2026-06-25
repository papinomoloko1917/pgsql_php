<?php

declare(strict_types=1);

use App\Database\Database;
use App\Database\seeder\ProductsSeeder;

$db = new Database();
$command = $argv[2];

if ($command === 'products') {
    ProductsSeeder::seed($db);
    echo "Таблица $command успешно заполенена тестовыми данными";
    exit(0);
} else {
    echo "Некорректная команда - $command";
    exit(1);
}
