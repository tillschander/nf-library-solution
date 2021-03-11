<?php

namespace App\Controller;

use App\Entities\Category;
use App\Entities\Item;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManager;

class HomeController extends AbstractController
{
    public function show(EntityManager $em): Response
    {
        $categories = $em->getRepository(Category::class)->findAll();
        $items = $em->getRepository(Item::class)->findBy([], ['id' => 'DESC'], 5);

        return $this->render('home/show.html.twig', [
            'categories' => $categories,
            'items' => $items
        ]);
    }
}
