<?php

use App\Controller\HomeController;
use App\Controller\CategoryController;
use App\Controller\ItemController;
use App\Controller\CartController;

return [
    ['GET', '/', [HomeController::class, 'show']],
    ['GET', '/categories/{slug}', [CategoryController::class, 'show']],
    ['GET', '/items/{id}', [ItemController::class, 'show']],
    ['POST', '/cart/{id}', [CartController::class, 'add']],
    ['POST', '/borrow', [CartController::class, 'borrow']],
    ['GET', '/cart', [CartController::class, 'show']],
    ['GET', '/cart/success', [CartController::class, 'success']],
];
