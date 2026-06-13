<?php

declare(strict_types=1);

namespace App;

use App\Controller\Product;
use App\Database\Connect;

final class App
{
    public function __construct(
    ) {
    }
    public function run(): void
    {
        $db = Connect::fromEnv();

        $product = new Product($db);

        if ($_SERVER['REQUEST_URI'] === '/add_product') {
            $product->store();
        }

        echo $product->index();
    }
}
