<?php

namespace App;

use ReflectionMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class Kernel
{
    private function getControllerMethodArguments(array $match): array
    {
        $controllerClass = $match['_controller'][0];
        $methodName = $match['_controller'][1];
        $reflectionMethod = new ReflectionMethod($controllerClass, $methodName);

        return array_map(
            fn($parameter) => $match[$parameter->getName()],
            $reflectionMethod->getParameters()
        );
    }

    public function handle(Request $request, bool $catchErrors): Response
    {
        try {
            $routes = include __DIR__ . '/../config/routes.php';
            $context = RequestContext::fromUri($request->getUri());
            $matcher = new UrlMatcher($routes, $context);
            $match = $matcher->match($request->getPathInfo());
            $controller = new $match['_controller'][0];
            $methodName = $match['_controller'][1];
            $arguments = $this->getControllerMethodArguments($match);

            return call_user_func_array([$controller, $methodName], $arguments);
        } catch (ResourceNotFoundException $exception) {
            return new Response('Not Found', 404);
        } catch (\Exception $exception) {
            if (!$catchErrors) throw $exception;
            return new Response('An error occurred', 500);
        }
    }
}
