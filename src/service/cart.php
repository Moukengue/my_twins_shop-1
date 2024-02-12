<?php

namespace App\Services;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\RequestStack;

class cart {

    private $session;

    public function __construct(RequestStack $requestStack) {
        $this->session = $requestStack->getSession();
    }

    public function add(Produit $produit) {

        $cart = $this->session->get("cart", []);
        // dd($cart);

        $trouve = -1;
        foreach($cart as $i => $c) {
            if( $c["produit"]->getId() == $produit->getId()) {
                $trouve = $i;
            }
        }

        if ($trouve==-1) {
            $cart [] = [
                'produit' => $produit,
                'quantite' => 1
            ];
        }
        else {
            $cart [$trouve]["quantite"]++;
        }



        $this->session->set("cart", $cart );

        return $cart ;
    }

    public function quantite() {

        $cart  = $this->session->get("cart", []);

        $quantite = 0;
        foreach($cart as $item) {
            $quantite += $item["quantite"];
        }

        return $quantite;
    }
}