<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use RuntimeException;

final class Connect
{
    private readonly string $dsn;

    public function __construct(
        private readonly string $hostName,
        private readonly string $port,
        private readonly string $dbName,
        private readonly string $userName,
        private readonly string $password,
    ) {
        $this->dsn = "pgsql:host={$this->hostName};port={$this->port};dbname={$this->dbName}";
    }
    public static function fromEnv(): self
    {
        $hostName = self::validateEnv('DB_HOST');
        $port = self::validateEnv('DB_PORT');
        $dbName = self::validateEnv('DB_DATABASE');
        $userName = self::validateEnv('DB_USERNAME');
        $password = self::validateEnv('DB_PASSWORD');

        return new self(
            hostName: $hostName,
            port: $port,
            dbName: $dbName,
            userName: $userName,
            password: $password
        );
    }

    private static function validateEnv(string $key): string
    {
        $env = getenv($key);
        if ($env === false) {
            throw new RuntimeException("{$key} is not set");
        }
        return $env;
    }
    public function get(): PDO
    {
        return new PDO(
            $this->dsn,
            $this->userName,
            $this->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }
}
