<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Database;
use App\Model\Product;
use App\Request\Request;
use App\View\View;

class ProductController extends Controller
{
    public function __construct(
        Request $request,
        View $view,
        Database $db,
        private readonly Product $productModel
    ) {
        parent::__construct($request, $view, $db);
    }
    public function index(): string
    {
        $products = $this->productModel->getAll();

        return $this->view('products/showProducts', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Список товаров',
            'products' => $products
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

        $errors = $this->productModel->save($title, $description, $price);

        if (!empty($errors)) {
            return $this->view('products/storeProduct', [
                'currentPath' => $this->view->getCurrentPath(),
                'title' => 'Добавление товара',
                'errors' => $errors,
                'name' => $title,
                'description' => $description,
                'price' => $price
            ]);
        }

        header('Location: /');
        exit;
    }
}
