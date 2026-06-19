<?php

declare(strict_types=1);

namespace App\Factory;

use App\Controller\Controller;
use App\Controller\ProductController;
use App\Database\Database;
use App\Model\Product;
use App\Request\Request;
use App\View\View;

final class ControllerFactory
{
    public function __construct(
        private readonly Request $request,
        private readonly View $view,
        private readonly Database $db,
        private readonly Product $productModel
    ) {
    }
    public function make(string $controllerClass): Controller
    {
        if ($controllerClass === ProductController::class) {
            return new $controllerClass(
                $this->request,
                $this->view,
                $this->db,
                $this->productModel
            );
        }
        return new $controllerClass(
            $this->request,
            $this->view,
            $this->db,
        );
    }
}
