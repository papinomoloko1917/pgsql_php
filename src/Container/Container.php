<?php

declare(strict_types=1);

namespace App\Container;

use App\Database\Database;
use App\Database\Seeder\ProductsSeeder;
use App\Dispatcher\Dispatcher;
use App\Factory\ControllerFactory;
use App\Model\Product;
use App\Request\Request;
use App\Router\Router;
use App\Session\Flash;
use App\Validator\ProductValidator;
use App\View\View;

final class Container
{
    public readonly array $routes;
    public readonly Request $request;
    public readonly Router $router;
    public readonly ControllerFactory $controllerFactory;
    public readonly Dispatcher $dispatcher;
    public readonly View $view;
    public readonly Database $db;
    public readonly ProductValidator $productValidator;
    public readonly Product $productModel;
    public readonly Flash $flash;

    public function __construct()
    {
        $this->registerServices();
    }
    private function registerServices(): void
    {
        $this->routes = require APP_PATH . '/routes/web.php';

        $this->request = Request::createFromGlobals();

        $this->router = new Router(
            $this->routes,
            $this->request
        );

        $this->view = new View();

        $this->db = new Database();

        $this->productValidator = new ProductValidator();

        $this->productModel = new Product(
            $this->db,
            $this->productValidator
        );

        $this->flash = new Flash();

        $this->controllerFactory = new ControllerFactory(
            $this->request,
            $this->view,
            $this->db,
            $this->productModel,
            $this->flash,
        );

        $this->dispatcher = new Dispatcher(
            $this->view,
            $this->controllerFactory
        );
    }
}
