<?php

declare(strict_types=1);

namespace App\View;

final class View
{
    public function page(string $namePage): string
    {
        ob_start();
        require APP_PATH . "/public/view/pages/$namePage.php";
        $content = ob_get_clean();

        ob_start();
        require APP_PATH . "/public/view/layouts/mainLayout.php";
        $layout = ob_get_clean();

        return $layout;
    }
}
