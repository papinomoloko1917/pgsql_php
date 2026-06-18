<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\View;

class HomeController extends Controller
{
    public function index(): string
    {
        return $this->view('home', [
            'currentPath' => $this->view->getCurrentPath(),
            'title' => 'Главная'
        ]);

    }
}
