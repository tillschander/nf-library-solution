<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Entities\Item;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require_once __DIR__ . '/../../bootstrap.php';

class ItemController extends AbstractController
{
    public function show(string $id): Response
    {
        $entityManager = getEntityManager();

        $item = $entityManager->getRepository(Item::class)->find($id);

        if (!isset($item)) {
            throw new ResourceNotFoundException('Item not found!');
        }

        return $this->render('item/show.html.twig', [
            'item' => $item
        ]);
    }
}
