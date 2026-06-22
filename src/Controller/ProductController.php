<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Database;
use App\Model\Product;
use App\Request\Request;
use App\Session\Flash;
use App\View\View;

class ProductController extends Controller
{
    public function __construct(
        Request $request,
        View $view,
        Database $db,
        private readonly Product $productModel,
        private readonly Flash $flash,
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
    public function storeProduct(): string
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

        $this->flash->success('Товар успешно добавлен');

        header('Location: /showProducts');
        exit;
    }

    public function editProductIndex(): string
    {
        $id = (int) $this->request->query('id');

        $findProduct = $this->productModel->findById($id);

        if ($findProduct === null) {
            header('Location: /showProducts');
            exit;
        }

        return $this->view('products/editProductIndex', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Редактирование товара',
            'product' => $findProduct
        ]);
    }
    public function updateProduct(): string
    {

        $id = (int) $this->request->input('id');
        $title = $this->request->input('title');
        $description = $this->request->input('description');
        $price = $this->request->input('price');

        $errors = $this->productModel->update($id, $title, $description, $price);


        if (!empty($errors)) {
            return $this->view('products/editProductIndex', [
                'currentPath' => $this->view->getCurrentPath(),
                'title' => 'Редактирование товара',
                'errors' => $errors,
                'product' => [
                    'id' => $id,
                    'title' => $title,
                    'description' => $description,
                    'price' => $price,
                ],
            ]);
        }

        $this->flash->success('Товар успешно изменен');

        header('Location: /showProducts');
        exit;
    }

    public function deleteProduct(): void
    {
        $id = (int)$this->request->input('id');

        $this->productModel->delete($id);

        $this->flash->success('Товар успешно удален');

        header('Location: /showProducts');
        exit;
    }
}
