<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entities\Item;
use Doctrine\ORM\EntityManager;

class ItemController extends AbstractController
{
    public function show(string $id, EntityManager $em): Response
    {
        $item = $em->getRepository(Item::class)->find($id);

        return !isset($item)
            ? $this->notFound('Item not found')
            : $this->render('item/show.html.twig', ['item' => $item]);
    }
}
