<?php

declare(strict_types=1);

use App\Database\migration\createProductTable;
use App\Database\Database;

$db = new Database();

if ($argv[2] === 'products') {
    createProductTable::createProductTable($db);
    echo "Таблица products добавлена\n";
    exit(0); // Успех
} else {
    echo "Команда {$argv[2]} не распознана\n";
    exit(1);
}
