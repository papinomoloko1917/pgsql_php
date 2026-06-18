<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\View;

class AboutController extends Controller
{
    public function index()    {
        return $this->view('about', [
            'currentPath'=>$this->view->getCurrentPath(),
            'title'=>'О нас'
        ]);
    }
}
