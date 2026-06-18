<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\View;

class ProductController extends Controller
{
    public function index(): string
    {
        return $this->view('products/showProducts', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Список товаров'
        ]);
    }

    public function storeIndex(): string
    {
        return $this->view('products/storeProduct', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Добавление товара'
        ]);
    }
    public function storeProduct()
    {
        $title = $this->request->input('title');
        $description = $this->request->input('description');
        $price = $this->request->input('price');

        $sql = "INSERT INTO products (title, description, price) VALUES (:title, :description, :price)";

        $conn = $this->db->conn();

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':price' => $price
        ]);

        header('Location: /');
        exit;
    }
}
