<?php

declare(strict_types=1);

namespace App\Container;

use App\Dispatcher\Dispatcher;
use App\Request\Request;
use App\Router\Router;
use App\View\View;

final class Container
{
    public readonly array $routes;
    public readonly Request $request;
    public readonly Router $router;
    public readonly Dispatcher $dispatcher;
    public readonly View $view;

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

        $this->dispatcher = new Dispatcher(
            $this->view
        );
    }
}
