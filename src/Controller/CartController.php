<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class CartController extends AbstractController
{
    public function show(): Response
    {
        return $this->render('cart/show.html.twig');
    }

    public function success(): Response
    {
        return $this->render('cart/success.html.twig');
    }
}
