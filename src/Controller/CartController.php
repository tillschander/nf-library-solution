<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use App\Entities\Item;
use Doctrine\ORM\EntityManager;

class CartController extends AbstractController
{
    public function show(EntityManager $em, Request $request): Response
    {
        $ids = json_decode($request->cookies->get('cart', '[]'));
        $items = $em->getRepository(Item::class)->findBy(['id' => $ids]);

        return $this->render('cart/show.html.twig', [
            'items' => $items
        ]);
    }

    public function add(string $id, Request $request): Response
    {
        $ids = json_decode($request->cookies->get('cart', '[]'));
        $ids[] = $id;
        $cookie = Cookie::create('cart', json_encode($ids), 0, '/', null, null, false, true);
        $response = $this->redirect('/cart');
        $response->headers->setCookie($cookie);

        return $response;
    }

    public function borrow(): Response
    {
        $cookie = Cookie::create('cart', json_encode([]), 0, '/', null, null, false, true);
        $response = $this->redirect('/cart/success');
        $response->headers->setCookie($cookie);

        return $response;
    }

    public function success(): Response
    {
        return $this->render('cart/success.html.twig');
    }
}
