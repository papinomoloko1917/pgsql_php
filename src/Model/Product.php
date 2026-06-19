<?php

declare(strict_types=1);

namespace App\Model;

use App\Database\Database;
use App\Validator\ProductValidator;
use PDO;

final class Product
{
    public function __construct(
        private readonly Database $db,
        private readonly ProductValidator $productValidator
    ) {
    }
    public function save(string $title, string $description, string $price): array
    {
        $errors = $this->productValidator->validate($title, $description, $price);

        if (!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO products (title, description, price) VALUES (:title, :description, :price)";

        $stmt = $this->db->conn()->prepare($sql);

        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':price' => $price
        ]);

        return [];
    }
    public function getAll(): array
    {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->db->conn()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
