<?php

declare(strict_types=1);

namespace App\Factory;

use App\Controller\Controller;
use App\Controller\ProductController;
use App\Database\Database;
use App\Database\seeder\ProductsSeeder;
use App\Model\Product;
use App\Request\Request;
use App\Session\Flash;
use App\View\View;

final class ControllerFactory
{
    public function __construct(
        private readonly Request $request,
        private readonly View $view,
        private readonly Database $db,
        private readonly Product $productModel,
        private readonly Flash $flash,
        private readonly ProductsSeeder $productsSeeder
    ) {
    }
    public function make(string $controllerClass): Controller
    {
        if ($controllerClass === ProductController::class) {
            return new $controllerClass(
                $this->request,
                $this->view,
                $this->db,
                $this->productModel,
                $this->flash,
                $this->productsSeeder
            );
        }
        return new $controllerClass(
            $this->request,
            $this->view,
            $this->db,
        );
    }
}
