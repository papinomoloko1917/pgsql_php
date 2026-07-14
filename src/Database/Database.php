<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use RuntimeException;

final class Database
{
    private string $host;
    private string $database;
    private string $port;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->host = $this->getEnvOrThrow('POSTGRES_CONTAINER_NAME');
        $this->database = $this->getEnvOrThrow('POSTGRES_DB');
        $this->port = $this->getEnvOrThrow('POSTGRES_PORT');
        $this->username = $this->getEnvOrThrow('POSTGRES_ROOT_USER');
        $this->password = $this->getEnvOrThrow('POSTGRES_ROOT_PASSWORD');
    }
    public function getEnvOrThrow(string $key): string
    {
        $value = getenv($key);
        if ($value === false || $value === null) {
            throw new RuntimeException('Ошибка ENV');
        }
        return $value;
    }

    public function conn(): PDO
    {

        $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->database}";

        return new PDO(
            $dsn,
            $this->username,
            $this->password
        );
    }
}
