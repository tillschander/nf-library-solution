<?php

namespace App\Controller;

use App\Entities\Category;
use App\Entities\Item;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../../bootstrap.php';

class HomeController extends AbstractController
{
    public function show(): Response
    {
        $entityManager = getEntityManager();
        $categories = $entityManager->getRepository(Category::class)->findAll();
        $items = $entityManager->getRepository(Item::class)->findBy([], ['id' => 'DESC'], 5);

        return $this->render('home/show.html.twig', [
            'categories' => $categories,
            'items' => $items
        ]);
    }
}
