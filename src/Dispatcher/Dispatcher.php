<?php

declare(strict_types=1);

namespace App\Dispatcher;

use App\Controller\Controller;
use App\Factory\ControllerFactory;
use App\Route\Route;
use App\View\View;
use Closure;
use RuntimeException;

final class Dispatcher
{
    public function __construct(
        private readonly View $view,
        private readonly ControllerFactory $controllerFactory
    ) {
    }

    public function dispatch(Route $targetRoute): string
    {
        if ($targetRoute->getHandler() instanceof Closure) {
            return $targetRoute->getHandler()();
        }
        [$handler, $method] = $targetRoute->getHandler();

        if (!class_exists($handler)) {
            throw new RuntimeException("Класс $handler некорректен");
        }
        if (!method_exists($handler, $method)) {
            throw new RuntimeException("Метод $method некорректен");
        }

        $this->view->setCurrentPath($targetRoute->getPath());

        $class = new $handler(
            $this->view
        );

        return $class->$method();
    }
}
