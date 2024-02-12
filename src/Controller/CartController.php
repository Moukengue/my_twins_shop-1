<?php

namespace App\Controller;

use App\Services\Cart;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'app_cart')]
    public function panier(SessionInterface $session): Response
    {
        $cart = $session->get("cart", []);
        return $this->render('cart/panier.html.twig', [
            'cart' => '$cart',
        ]);
    }
    

    #[Route('/add/{produit}', name: 'app_cart_add')]
    public function add(Produit $produit, Cart $service_cart): Response
    {
        
        $service_cart->add($produit);

        return $this->redirect("/cart");

    }

}


