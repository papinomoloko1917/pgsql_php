<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Database;
use App\Request\Request;
use App\View\View;

abstract class Controller
{
    public function __construct(
        protected readonly Request $request,
        protected readonly View $view,
        protected readonly Database $db
    ) {
    }
    protected function view(string $namePage, array $data = []): string
    {
        return $this->view->render($namePage, $data);
    }
}
