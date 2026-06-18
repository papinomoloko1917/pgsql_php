<?php

declare(strict_types=1);

namespace App\Factory;

use App\Controller\Controller;
use App\Controller\ProductController;
use App\Database\Database;
use App\Request\Request;
use App\View\View;

final class ControllerFactory
{
    public function __construct(
        private readonly Request $request,
        private readonly View $view,
        private readonly Database $db
    ) {
    }
    public function make(string $controllerClass): Controller
    {
        if ($controllerClass === ProductController::class) {
            return new $controllerClass(
                $this->request,
                $this->view,
                $this->db
            );
        }
        return new $controllerClass(
            $this->request,
            $this->view,
            $this->db
        );
    }
}
