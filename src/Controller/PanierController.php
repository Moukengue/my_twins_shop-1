<?php

namespace App\Controller;

use App\Entity\Produit;
use App\service\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function panier(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        return $this->render('cart/panier.html.twig', [
            'panier' => $panier,
        ]);
    }

    #[Route('/add/{produit}', name: 'app_panier_add')]
    public function add(Produit $produit, Panier $service_panier): Response
    {
        //dd($produit);
        $service_panier->add($produit);

        return $this->redirect("/panier");

    }


    /*#[Route('/remove/{produit}', name: 'app_panier_remove')]
    public function remove(Produit $produit, Panier $service_panier): Response
    {
        $service_panier->remove($produit);

        return $this->redirect("/panier");
    }*/

}

