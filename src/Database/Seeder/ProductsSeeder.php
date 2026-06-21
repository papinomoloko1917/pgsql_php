<?php

declare(strict_types=1);

namespace App\Database\Seeder;

use App\Database\Database;

final class ProductsSeeder
{
    public function __construct(
        private readonly Database $db
    ) {
    }
    public function seed(): void
    {
        $repository = $this->repository();

        foreach ($repository as $object) {
            $sql = "INSERT INTO products (title,description,price) VALUES (:title,:description,:price)";

            $stmt = $this->db->conn()->prepare($sql);

            $stmt->execute([
                ':title' => $object['title'],
                ':description' => $object['description'],
                ':price' => $object['price'],
            ]);
        }
    }
    private function repository(): array
    {
        return [
            ['title' => 'Ноутбук', 'description' => 'Отличный ноутбук c wifi', 'price' => 500],
            ['title' => 'Роутер', 'description' => 'Отличный роутер c wifi', 'price' => 300],
            ['title' => 'Телевизор', 'description' => 'Хороший телевизор', 'price' => 450],
            ['title' => 'Холодильние', 'description' => 'Большой холодильник', 'price' => 700],
        ];
    }
}
