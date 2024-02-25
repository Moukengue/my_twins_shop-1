<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Entity\SousRubrique;
use App\Repository\SousRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    //Tout les produits
    #[Route('/produit', name: 'app_produit')]
    public function produitAll(ProduitRepository $produitRepo): Response
    {
        $produits = $produitRepo->findAll();
        $nouveauxProduits = $produitRepo->findBy(array(), ['id' => 'DESC'], 5, null);
        // dd($produits);
        return $this->render('produit/produitAll.html.twig', [
            'produits' =>$produits,
            "nouveauxProduits" => $nouveauxProduits,
          ]);
    }

    // Produit d'une sous rubrique
    #[Route('/produit/{sousrubrique}', name: 'app_produit_sous_rubrique')]
    public function produit($sousrubrique, ProduitRepository $produitRepo): Response
    {
        $produits = $produitRepo->findBySousRubrique($sousrubrique);
        // dd($produits);
        return $this->render('produit/produit.html.twig', [
            'produits' =>$produits
          ]);
    }
    
    //Detail d'un produit
    #[Route('/produit/detail/{produit}', name: 'app_produit_detail')]
    public function detail($produit, ProduitRepository $produitRepo): Response
    {
        $detailpro = $produitRepo->findOneByid($produit);
        //  dd($detailpro);
        return $this->render('produit/produitdetail.html.twig', [
            'produit' =>$detailpro
          ]);
    }

}



