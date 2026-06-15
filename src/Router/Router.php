<?php

declare(strict_types=1);

namespace App\Router;

use App\Request\Request;
use App\Route\Route;
use RuntimeException;

final class Router
{
    public function __construct(
        private readonly array $routes,
        private readonly Request $request,
    ) {
    }
    public function handle(): Route
    {
        $pathFound = false;

        foreach ($this->routes as $route) {
            if ($this->request->getPath() === $route->getPath()) {
                $pathFound = true;
                if ($this->request->getMethod() === $route->getMethod()) {
                    return $route;
                }
            }
        }
        if (!$pathFound) {
            throw new RuntimeException('Путь не найден | 404', 404);
        }

        throw new RuntimeException('Метод не найден | 405', 405);
    }
}
