<?php

declare(strict_types=1);

namespace App\Database\migration;

use App\Database\Database;

final class createProductTable
{
    public function __construct()
    {

    }
    public static function createProductTable(Database $database): void
    {
        $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        price NUMERIC(10,2) NOT NULL,
        created_at TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP
        )";

        $database->conn()->exec($sql);
    }
}
