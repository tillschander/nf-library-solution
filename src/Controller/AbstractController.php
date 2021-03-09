<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig;

abstract class AbstractController
{
    protected function render(string $view, array $parameters = []): Response
    {
        $loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $twig = new Twig\Environment($loader, [
            'cache' => __DIR__ . '/../../var/templates',
            'auto_reload' => true
        ]);
        $content = $twig->render($view, $parameters);

        return new Response($content);
    }

    protected function json($data): Response
    {
        $json = json_encode($data);
        $headers = [
            'Content-Type' => 'application/json'
        ];

        return new Response($json, 200, $headers);
    }
}
