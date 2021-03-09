<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ItemController extends AbstractController
{
    public function show(string $item): Response
    {
        return $this->render('item/show.html.twig', [
            'item' => $item
        ]);
    }
}
