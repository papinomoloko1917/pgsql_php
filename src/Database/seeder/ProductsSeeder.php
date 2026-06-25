<?php

declare(strict_types=1);

namespace App\Database\seeder;

use App\Database\Database;

final class ProductsSeeder
{
    public function __construct()
    {
    }
    public static function seed(Database $db): void
    {
        $repository = self::repository();

        foreach ($repository as $object) {
            $sql = "INSERT INTO products (title,description,price) VALUES (:title,:description,:price)";

            $stmt = $db->conn()->prepare($sql);

            $stmt->execute([
                ':title' => $object['title'],
                ':description' => $object['description'],
                ':price' => $object['price'],
            ]);
        }
    }
    private static function repository(): array
    {
        return [
    ['title' => 'Ноутбук', 'description' => 'Отличный ноутбук c wifi', 'price' => 500],
    ['title' => 'Роутер', 'description' => 'Отличный роутер c wifi', 'price' => 300],
    ['title' => 'Телевизор', 'description' => 'Хороший телевизор', 'price' => 450],
    ['title' => 'Холодильник', 'description' => 'Большой холодильник', 'price' => 700],
    ['title' => 'Монитор', 'description' => '27-дюймовый IPS-монитор', 'price' => 320],
    ['title' => 'Клавиатура', 'description' => 'Механическая клавиатура с подсветкой', 'price' => 120],
    ['title' => 'Мышь', 'description' => 'Беспроводная оптическая мышь', 'price' => 40],
    ['title' => 'Принтер', 'description' => 'Лазерный принтер с Wi-Fi', 'price' => 250],
    ['title' => 'Сканер', 'description' => 'Планшетный сканер для документов', 'price' => 180],
    ['title' => 'Наушники', 'description' => 'Беспроводные наушники с шумоподавлением', 'price' => 150],
    ['title' => 'Колонки', 'description' => 'Активные колонки с Bluetooth', 'price' => 90],
    ['title' => 'Планшет', 'description' => '10-дюймовый планшет с 4G', 'price' => 400],
    ['title' => 'Смартфон', 'description' => 'Смартфон с большим экраном и хорошей камерой', 'price' => 600],
    ['title' => 'Умные часы', 'description' => 'Смарт-часы с мониторингом здоровья', 'price' => 200],
    ['title' => 'Игровая приставка', 'description' => 'Игровая консоль с 1TB памяти', 'price' => 800],
];
    }
}
