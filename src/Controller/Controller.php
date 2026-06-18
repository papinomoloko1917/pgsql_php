<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\View;

abstract class Controller
{
    public function __construct(
        protected readonly View $view
    ) {
    }
    protected function view(string $namePage, array $data =[]): string{
        return $this->view->render($namePage, $data);
    }
}
