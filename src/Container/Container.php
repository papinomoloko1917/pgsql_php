<?php

declare(strict_types=1);

namespace App\Container;

use App\Dispatcher\Dispatcher;
use App\Factory\ControllerFactory;
use App\Request\Request;
use App\Router\Router;
use App\View\View;
use Dba\Connection;

final class Container
{
    public readonly array $routes;
    public readonly Request $request;
    public readonly Router $router;
    public readonly ControllerFactory $controllerFactory;
    public readonly Dispatcher $dispatcher;
    public readonly View $view;
    public readonly Connection $conn;

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

        $this->conn = new Connection();

        $this->controllerFactory = new ControllerFactory(
            $this->request,
            $this->view,
            $this->conn
        );

        $this->dispatcher = new Dispatcher(
            $this->view,
            $this->controllerFactory
        );
    }
}
