<?php

use Symfony\Component\Routing;
use App\Controller\HomeController;
use App\Controller\CategoryController;
use App\Controller\ItemController;
use App\Controller\CartController;
use Symfony\Component\Routing\Route;

function route(string $verb, string $path, string $controller, string $method): Route
{
    return new Route($path, [
        '_controller' => [$controller, $method]

    ], [], [], null, ['http', 'https'], [$verb]);
}

$routes = new Routing\RouteCollection();
$routes->add('home.show', route('GET', '/', HomeController::class, 'show'));
$routes->add('category.show', route('GET', '/categories/{slug}', CategoryController::class, 'show'));
$routes->add('item.show', route('GET', '/items/{item}', ItemController::class, 'show'));
$routes->add('cart.show', route('GET', '/cart', CartController::class, 'show'));
$routes->add('cart.success', route('GET', '/cart/success', CartController::class, 'success'));

return $routes;
