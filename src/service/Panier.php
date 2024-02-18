<?php

namespace App\service;

use App\Entity\Produit;
use Symfony\Component\HttpFoundation\RequestStack;

class Panier
{

    private $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    public function add(Produit $produit)
    {

        $panier = $this->session->get("panier", []);
        //dd($panier);

        $trouve = -1;
        foreach ($panier as $i => $p) {
            if ($p["produit"]->getId() == $produit->getId()) {
                $trouve = $i;
            }
        }

        if ($trouve == -1) {
            $panier[] = [
                'produit' => $produit,
                'quantite' => 1
            ];
        } else {
            $panier[$trouve]["quantite"]++;
        }



        $this->session->set("panier", $panier);

        return $panier;
    }

    public function quantite()
    {

        $panier = $this->session->get("panier", []);

        $quantite = 0;
        foreach ($panier as $item) {
            $quantite += $item["quantite"];
        }

        return $quantite;
    }

    //Remove

    public function remove(Produit $produit)
    {

        // $panier = $this->session->get("panier", []);
        $panier[] = [
            'produit' => $produit,
            'quantite' => 0
        ];
        $this->session->set("panier", $panier);
        return $panier;
    }
}
