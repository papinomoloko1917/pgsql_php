<?php

declare(strict_types=1);

namespace App\Database;

use PDO;
use RuntimeException;

final class Database
{
    private readonly string $username;
    private readonly string $password;
    private readonly string $port;
    private readonly string $dbhost;
    private readonly string $dbname;
    private readonly string $connectTimeout;

    public function __construct()
    {
        $this->username = $this->getEnv('POSTGRES_ROOT_USER');
        $this->password = $this->getEnv('POSTGRES_ROOT_PASSWORD');
        $this->port = $this->getEnv('POSTGRES_PORT');
        $this->dbhost = $this->getEnv('POSTGRES_CONTAINER_NAME');
        $this->dbname = $this->getEnv('POSTGRES_DB');
        $this->connectTimeout = $this->getEnv('POSTGRES_CONNECT_TIMEOUT');
    }

    public function conn(): PDO
    {
        $dsn = "pgsql:host=$this->dbhost;port=$this->port;dbname=$this->dbname;connect_timeout=$this->connectTimeout";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        return new PDO(
            $dsn,
            $this->username,
            $this->password,
            $options
        );
    }
    private function getEnv(string $key): string
    {
        $value = getenv($key);

        if ($value === false) {
            throw new RuntimeException("Переменная $key не задана");
        }

        return $value;
    }
}
