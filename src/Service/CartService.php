<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {

    protected $session;
    protected $productRepository;

    public function __construct(SessionInterface $session, ProductRepository $productRepository) {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    public static function add(int $Id) {
        $cart = $this->session->get("cart", []);

        if(!empty($cart[$id])) {
            $cart["id"]++;
        } else {
            $cart["id"]  = 1;
        }

        $this->session->set("cart", $cart);
    }

    public static function less(int $Id) {
        $cart = $this->session->get("cart", []);

        if(!empty($cart[$id])) {
            $cart["id"]--;
        }

        $this->session->set("cart", $cart);
    }

    public static function remove(int $Id) {
        $cart = $this->session->get("cart", []);

        if(!empty($cart[$id])) {
            unset($cart["id"]);
        }

        $this->session->set("cart", $cart);
    }

    public static function getFullCart(): array{
        $cart = $this->session->get("cart", []);

        $cartWithData = [];

        foreach ($cart as $id => $qty) {
            $cartWithData[] = [
                'product' => $this->productRepository->find($id),
                'quantity' => $qty
            ];
        }

        return $cartWithData;
    }

    public static function getTotal(): float {
        $total = 0;

        foreach ($this->getFullCart as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }

        return $total;
    }
}