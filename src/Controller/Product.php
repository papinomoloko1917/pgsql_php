<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Connect;
use PDO;
use RuntimeException;

class Product
{
    public function __construct(
        private readonly Connect $db
    ) {
    }
    public function index(): string
    {
        ob_start();
        require APP_PATH . '/public/view/pages/addProducts.php';
        $content = ob_get_clean();

        ob_start();
        require APP_PATH . '/public/view/layouts/mainLayout.php';
        $layout = ob_get_clean();

        return $layout;
    }
    public function store(): void
    {
        $pdo = $this->db->get();

        $sql = "INSERT INTO products (name, price, stock) VALUES (:name, :price, :stock)";

        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $stock = $_POST['stock'] ?? null;

        if ($this->tableExist($pdo)) {
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ':name' => $name,
                ':price' => $price,
                ':stock' => $stock
            ]);

            header('Location: /');
            exit;
        } else {
            throw new RuntimeException('Данной таблицы не существует');
        }
    }
    private function tableExist(PDO $pdo): bool
    {
        $tableName = 'products';
        $stmt = $pdo->prepare("SELECT EXISTS (SELECT 1 FROM information_schema.tables WHERE table_name = :table AND table_schema = 'public')");
        $stmt->execute([':table' => $tableName]);
        $exists = $stmt->fetchColumn();

        if ($exists) {
            return true;
        }
        return false;
    }
    public function createTable(): void
    {
        $sql = 'CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price NUMERIC(10,2) NOT NULL,
    stock INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)';
        $conn = $this->db->get();
        $conn->exec($sql);
    }
}
