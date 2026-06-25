<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Database\migration\createProductTable;
use App\Database\Database;

$db = new Database();
$command = $argv[2] ?? null;

if ($command === null) {
    echo "Команда не определена\n";
    exit(1);
}

if ($command === 'products') {
    createProductTable::createProductTable($db);
    echo "Таблица products добавлена\n";
    exit(0);
} else {
    echo "Команда {$command} не распознана\n";
    exit(1);
}
