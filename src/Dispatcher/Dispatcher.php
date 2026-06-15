<?php

declare(strict_types=1);

namespace App\Dispatcher;

use App\Route\Route;
use App\View\View;
use Closure;
use RuntimeException;

final class Dispatcher
{
    public function __construct(
        private readonly View $view
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

        $class = new $handler(
            $this->view
        );
        return $class->$method();
    }
}
