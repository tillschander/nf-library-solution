<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entities\Category;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require_once __DIR__ . '/../../bootstrap.php';

class CategoryController extends AbstractController
{
    public function show(string $slug): Response
    {
        $entityManager = getEntityManager();

        $category = $entityManager
            ->getRepository(Category::class)
            ->findOneBy(['slug' => $slug]);

        if (!isset($category)) {
            throw new ResourceNotFoundException('Category not found!');
        }
   
        return $this->render('category/show.html.twig', [
            'name' => $category->getName(),
            'items' => $category->getItems()
        ]);
    }
}
