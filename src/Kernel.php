<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use DI\ContainerBuilder;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use function FastRoute\simpleDispatcher;

class Kernel
{
    private $container;
    private $dispatcher;

    public function __construct(string $environment)
    {
        $this->initErrorHandler($environment);
        $this->initContainer();
        $this->initDispatcher();
    }

    private function initErrorHandler(string $environment) {
        $whoops = new Run;
        if ($environment === 'development') {
            error_reporting(E_ALL);
            $whoops->pushHandler(new PrettyPageHandler);
        } else {
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            $whoops->pushHandler(function () {
                $response = new Response('Internal server error!', 500);
                $response->send();
            });
        }
        $whoops->register();
    }

    private function initContainer()
    {
        $containerBuilder = new ContainerBuilder;
        $containerBuilder->addDefinitions(__DIR__ . '/../config/services.php');
        $this->container = $containerBuilder->build();
    }

    private function initDispatcher()
    {
        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) {
            $routes = require __DIR__ . '/../config/routes.php';
            foreach ($routes as $route) {
                $r->addRoute($route[0], $route[1], $route[2]);
            }
        });
    }

    public function handle(Request $request): Response
    {
        $routeInfo = $this->dispatcher->dispatch($request->getMethod(), $request->getRequestUri());

        if ($routeInfo[0] === Dispatcher::FOUND) {
            return $this->container->call($routeInfo[1], $routeInfo[2]);
        }

        return new Response('Not Found', 404);
    }
}
