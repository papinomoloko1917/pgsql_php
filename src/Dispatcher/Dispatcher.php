<?php

declare(strict_types=1);

namespace App\Dispatcher;

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
        [$controllerClass, $method] = $targetRoute->getHandler();

        if (!class_exists($controllerClass)) {
            throw new RuntimeException("Класс $controllerClass некорректен");
        }
        if (!method_exists($controllerClass, $method)) {
            throw new RuntimeException("Метод $method некорректен");
        }

        $this->view->setCurrentPath($targetRoute->getPath());

        $class = $this->controllerFactory->make($controllerClass);

        return $class->$method();
    }
}
