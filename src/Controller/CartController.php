<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CartController extends AbstractController
{
    #[Route('/profile/cart', name: 'app_cart')]
    public function index(CartService $cartService): Response
    {

        return $this->render('cart/index.html.twig', [
            'items' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    #[Route('/profile/cart/add/{id}', name: 'app_cart_add')]
    public function add($id, CartService $cartService): Response
    {
        $cartService->add($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/profile/cart/rermove/{id}', name: 'app_cart_remove')]
    public function remove($id, CartService $cartService): Response
    {
        $cartService->remove($id);

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/profile/cart/less/{id}', name: 'app_cart_less')]
    public function less($id, CartService $cartService): Response
    {
        $cartService->less($id);

        return $this->redirectToRoute('app_cart');
    }
}
