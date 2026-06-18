<?php

declare(strict_types=1);

namespace App\Factory;

use App\Controller\Controller;
use App\Controller\ProductController;
use App\Request\Request;
use App\View\View;
use Dba\Connection;

final class ControllerFactory {
    public function __construct(
        private readonly Request $request,
        private readonly View $view,
        private readonly Connection $conn
    ){
    }
    public function make(string $controllerClass):Controller
    {
        if($controllerClass === ProductController::class){
            return new $controllerClass(
                $this->request,
                $this->view,
                $this->conn
            );
        }
    }
}
