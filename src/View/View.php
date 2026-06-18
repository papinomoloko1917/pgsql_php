<?php

declare(strict_types=1);

namespace App\View;

final class View
{
    private string $currentPath = '/';

    public function render(string $namePage, array $data = []): string
    {
        extract($data);

        ob_start();
        require APP_PATH . "/public/view/pages/$namePage.php";
        $content = ob_get_clean();

        ob_start();
        require APP_PATH . "/public/view/layouts/mainLayout.php";
        $layout = ob_get_clean();

        return $layout;
    }

    public function setCurrentPath(string $pagePath): void
    {
        $this->currentPath = $pagePath;
    }

    public function getCurrentPath()
    {
        return $this->currentPath;
    }
}
