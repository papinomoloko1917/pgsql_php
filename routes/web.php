<?php

declare(strict_types=1);

use App\Controller\AboutController;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Route\Route;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/about', [AboutController::class, 'index']),
    Route::get('/showProducts', [ProductController::class, 'index']),
    Route::get('/storeProduct', [ProductController::class, 'storeIndex'])
];
