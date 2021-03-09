<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    public function show(string $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' => ucfirst($category)
        ]);
    }
}
