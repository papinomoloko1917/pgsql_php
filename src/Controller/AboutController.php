<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\View;

class AboutController
{
    public function __construct(
        private readonly View $view
    ) {
    }
    public function index(): string
    {
        return $this->view->page('about');
    }
}
