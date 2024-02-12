<?php

namespace App\Controller;
use App\Services\cart;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Entity\SousRubrique;
use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    #[Route('/produit/{sousrubrique}', name: 'app_produit')]
    public function produit($sousrubrique, ProduitRepository $produitRepo): Response
    {
        $produits = $produitRepo -> findBySousRubrique($sousrubrique);
        // dd($produits);
        return $this->render('produit/produit.html.twig', [
            'produits' =>$produits
          ]);
    }
                         //Detail d'un produit

    #[Route('/produit/detail/{produit}', name: 'app_detail')]
    public function detail($produit, ProduitRepository $produitRepo): Response
    {
        $detailpro = $produitRepo -> findOneByid($produit);
        //  dd($detailpro);
        return $this->render('produit/produitdetail.html.twig', [
            'produit' =>$detailpro
          ]);
    }
//panier
    //public function panier(Panier $service_panier): Response
    //{

       // return $this->render(
        //    'catalogue/panier_quantite.html.twig',
        //        ['quantite' => $service_panier->quantite()]
        //);
   // }
}



