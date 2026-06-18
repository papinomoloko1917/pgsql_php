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

    public function storeIndex()
    {
        return $this->view('products/storeProduct', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Добавление товара'
        ]);
    }
}
