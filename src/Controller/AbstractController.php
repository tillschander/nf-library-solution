<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Doctrine\ORM\EntityManager;

abstract class AbstractController
{
    protected Environment $twig;
    protected Response $response;

    public function __construct(Response $response, Environment $twig)
    {
        $this->response = $response;
        $this->twig = $twig;
    }

    protected function render(string $view, array $parameters = []): Response
    {
        $html = $this->twig->render($view, $parameters);
        $this->response->setContent($html);

        return $this->response;
    }

    protected function json(mixed $data): Response
    {
        $this->response->headers->set('Content-Type', 'application/json');
        $this->response->setContent(json_encode($data));

        return $this->response;
    }

    protected function notFound(string $message = 'Not found'): Response
    {
        $this->response->setStatusCode(404);
        $this->response->setContent($message);

        return $this->response;
    }

    protected function redirect(string $url): Response
    {
        $this->response->headers->set('Location', $url);
        $this->response->setStatusCode(302);

        return $this->response;
    }
}
