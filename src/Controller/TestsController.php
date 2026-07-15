<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\Database;

class TestsController
{
    public function index(): string
    {
        ob_start();
        require_once APP_PATH . '/public/view/pages/tests.php';
        $content = ob_get_clean();

        ob_start();
        require_once APP_PATH . '/public/view/layout/layout.php';
        $layout = ob_get_clean();

        return $layout;
    }

    public function showTests()
    {

        $sql = "SELECT * FROM questions";

        $db = new Database();

        $pdo = $db->conn();

        $tests = $pdo->query($sql);

        ob_start();
        require_once APP_PATH . '/public/view/pages/showTests.php';
        $content = ob_get_clean();

        ob_start();
        require_once APP_PATH . '/public/view/layout/layout.php';
        $layout = ob_get_clean();

        return $layout;
    }
}
