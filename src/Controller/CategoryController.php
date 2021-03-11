<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entities\Category;
use Doctrine\ORM\EntityManager;

class CategoryController extends AbstractController
{
    public function show(string $slug, EntityManager $em): Response
    {
        $category = $em->getRepository(Category::class)->findOneBy(['slug' => $slug]);   

        return !isset($category)
            ? $this->notFound('Category not found')
            : $this->render('category/show.html.twig', [
                'name' => $category->getName(),
                'items' => $category->getItems()
            ]);
    }
}
